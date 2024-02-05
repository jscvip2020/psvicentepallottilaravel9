<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popupAll = Popup::all();
        return view('back.popup.index', compact('popupAll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'imagem' => 'required|image|mimes:png,jpg|dimensions:ratio=1/1',
            'nome' => 'required',
            'dataini' => 'required|date',
            'datafim' => 'required|date|after:dataini',
        ]);

        $file = $request->file('imagem');
        $name = $file->hashName();
        $path = Storage::putFileAs('/popup', $request->file('imagem'), $name);

        if ($path) {
            $statusOk = Popup::where('status', 1)->get();
            foreach ($statusOk as $s) {
                $s->update([
                    'status' => 0,
                ]);
            }
            $action = Popup::create([
                'imagem' => $name,
                'nome' => $request->nome,
                'url' => $request->url,
                'dataini' => $request->dataini,
                'datafim' => $request->datafim,
            ]);

            if ($action) {
                return redirect()->route('popup.index')->with('success', 'Popup inserido com sucesso!');
            } else {
                return redirect()->route('popup.index')->with('error', 'Popup não pode ser Inserido!');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit(Popup $popup)
    {
        $popupAll = Popup::all();
        return view('back.popup.index', compact('popupAll', 'popup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        $validado = $request->validate([
            'imagem' => 'nullable|image|mimes:png,jpg|dimensions:ratio=1/1',
            'nome' => 'required',
            'dataini' => 'required|date',
            'datafim' => 'required|date|after:dataini',
        ]);

        $file = $request->file('imagem');
        if ($file) {

            $name = $file->hashName();

            Storage::delete('popup/' . $popup->imagem);
            $arquivodeletado = Storage::get('popup/' . $popup->imagem);

            if (!$arquivodeletado) {
                $path = Storage::putFile('popup', $request->file('imagem'));
            }
            if ($path) {
                $action = $popup->update([
                    'imagem' => $name,
                    'nome' => $request->nome,
                    'url' => $request->url,
                    'dataini' => $request->dataini,
                    'datafim' => $request->datafim,
                ]);
            }
        } else {
            $action = $popup->update([
                'nome' => $request->nome,
                'url' => $request->url,
                'dataini' => $request->dataini,
                'datafim' => $request->datafim,
            ]);
        }

        if ($action) {
            return redirect()->route('popup.index')->with('success', 'Popup alterada com sucesso!');
        } else {
            return redirect()->route('popup.index')->with('error', 'Popup não pode ser alterada!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popup $popup)
    {

        Storage::delete('/popup/' . $popup->imagem);
        $arquivodeletado = Storage::get('/popup/' . $popup->imagem);

        if (!$arquivodeletado) {
            $action = $popup->delete();
            if ($action) {
                return redirect()->route('popup.index')->with('success', 'Popup deletado com sucesso!');
            } else {
                return redirect()->route('popup.index')->with('error', 'Popup não pode ser deletado!');
            }
        }
    }

    /**
     * Mudartao Satus do Popup
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  [type] $id
     *
     * @return void
     */
    public function status($id)
    {
        $popup = Popup::findOrFail($id);

        $allPopup = Popup::where('status', 1)->get();
        if (count($allPopup) > 0 && $popup->status == 0) {
            return redirect()->route('popup.index')->with('error', 'Status Popup não pode ser Alterado porque já tem popup ativo. Desative um popup ante de ativar o outro!');
        }

        $action = $popup->update([
            'status' => !$popup->status,
        ]);
        if ($action) {
            return redirect()->route('popup.index')->with('success', 'Status Popup Alterado com sucesso!');
        } else {
            return redirect()->route('popup.index')->with('error', 'Status Popup não pode ser Alterado!');
        }
    }
}

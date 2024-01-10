<?php

namespace App\Http\Controllers;

use App\Models\Chamada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChamadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chamadas = Chamada::all();
        return view('back.chamada.index', compact(['chamadas']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'imagem' => 'required|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=16/9',
            'url' => 'nullable|min:5',
        ]);
        $file = $request->file('imagem');
        $name = $file->hashName();
        $path = Storage::putFile('chamadas', $request->file('imagem'));

        if ($path) {
            $action = Chamada::create([
                'imagem' => $name,
                'url' => $request->url,
            ]);
            if ($action) {
                return redirect()->route('chamada.index')->with('success', 'Chamada inserido com sucesso!');
            } else {
                return redirect()->route('chamada.index')->with('error', 'Chamada não pode ser Inserido!');
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chamada $chamada)
    {
        $chamadas = Chamada::all();
        return view('back.chamada.index', compact(['chamada', 'chamadas']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chamada $chamada)
    {
        $validado = $request->validate([
            'imagem' => 'nullable|image|mimes:JPG,JPEG,jpeg,jpg,png|dimensions:ratio=16/9',
            'url' => 'nullable|min:5',
        ]);
        $file = $request->file('imagem');
        if ($file) {
            $name = $file->hashName();

            Storage::delete('chamadas/'.$chamada->imagem);
            $arquivodeletado = Storage::get('chamadas/'.$chamada->imagem);

            if(!$arquivodeletado){
            $path = Storage::putFile('chamadas', $request->file('imagem'));
            }
            if ($path) {
                $action = $chamada->update([
                    'imagem' => $name,
                    'url' => $request->url,
                ]);
            }
        }else{
            $action = $chamada->update([
                'url' => $request->url,
            ]);
        }


        if ($action) {
            return redirect()->route('chamada.index')->with('success', 'Chamada alterada com sucesso!');
        } else {
            return redirect()->route('chamada.index')->with('error', 'Chamada não pode ser alterada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chamada $chamada)
    {
        Storage::delete('chamadas/'.$chamada->imagem);
            $arquivodeletado = Storage::get('chamadas/'.$chamada->imagem);

            if(!$arquivodeletado){
                $action = $chamada->delete();
            if ($action) {
                return redirect()->route('chamada.index')->with('success', 'Chamada deletado com sucesso!');
            } else {
                return redirect()->route('chamada.index')->with('error', 'Chamada não pode ser deletado!');
            }
            }
    }

    /**
     * Modificar Status da chamada
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  $id
     *
     * @return void
     */
    public function status($id)
    {
        $chamada = Chamada::findOrFail($id);
        $action = $chamada->update([
            'status' => !$chamada->status,
        ]);
        if ($action) {
            return redirect()->route('chamada.index')->with('success', 'Status Chamada Alterado com sucesso!');
        } else {
            return redirect()->route('chamada.index')->with('error', 'Status Chamada não pode ser Alterado!');
        }
    }
}

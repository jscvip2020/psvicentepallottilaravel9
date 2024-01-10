<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imagens = Imagem::all();
        $tipos = Collect([
            (object)['id' => 'logo', 'nome' => 'Logo'],
            (object)['id' => 'secretaria', 'nome' => 'Secretaria'],
            (object)['id' => 'atendimento', 'nome' => 'Atendimento'],
            (object)['id' => 'confissao', 'nome' => 'Confissão'],
            (object)['id' => 'missa', 'nome' => 'Missas'],
            (object)['id' => 'imgcontato', 'nome' => 'Imagem contato'],
            (object)['id' => 'grupos', 'nome' => 'Grupos']
        ])->keyBy('id')->pluck('nome', 'id');
        return view('back.imagens.index', compact(['imagens', 'tipos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->tipo == "logo") {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:png|dimensions:ratio=1/1',
                'tipo' => 'required|unique:imagems',
            ]);
        } elseif ($request->tipo == "secretaria" || $request->tipo == "atendimento" || $request->tipo == "confissao" || $request->tipo == "missa" || $request->tipo == "grupos") {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:jpg,png|dimensions:ratio=1/1',
                'tipo' => 'required|unique:imagems',
            ]);
        } else {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:jpg,png',
                'tipo' => 'required|unique:imagems',
            ]);
        }

        $name = $request->tipo.".".$request->file('imagem')->extension();
        $path = Storage::putFileAs('/', $request->file('imagem'),$name);

        if ($path) {
            $action = Imagem::create([
                'imagem' => $name,
                'tipo' => $request->tipo,
            ]);

            if ($action) {
                return redirect()->route('imagem.index')->with('success', 'Imagem inserido com sucesso!');
            } else {
                return redirect()->route('imagem.index')->with('error', 'Imagem não pode ser Inserido!');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagem $imagem)
    {
        $imagens = Imagem::all();

        $tipos = Collect([
            (object)['id' => 'logo', 'nome' => 'Logo'],
            (object)['id' => 'secretaria', 'nome' => 'Secretaria'],
            (object)['id' => 'atendimento', 'nome' => 'Atendimento'],
            (object)['id' => 'confissao', 'nome' => 'Confissão'],
            (object)['id' => 'missa', 'nome' => 'Missas'],
            (object)['id' => 'imgcontato', 'nome' => 'Imagem contato'],
            (object)['id' => 'grupos', 'nome' => 'Grupos']
        ])->keyBy('id')->pluck('nome', 'id');
        return view('back.imagens.index', compact(['imagem', 'imagens','tipos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagem $imagem)
    {

        if ($request->tipo == "logo") {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:png|dimensions:ratio=1/1',
                'tipo' => 'required|unique:imagems,tipo,'.$imagem->id,
            ]);
        } elseif ($request->tipo == "secretaria" || $request->tipo == "atendimento" || $request->tipo == "confissao" || $request->tipo == "missa" || $request->tipo == "grupos") {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:jpg,png|dimensions:ratio=1/1',
                'tipo' => 'required|unique:imagems',
            ]);
        } else {
            $validado = $request->validate([
                'imagem' => 'required|image|mimes:jpg,png',
                'tipo' => 'required|unique:imagems',
            ]);
        }


        $file = $request->file('imagem');
        if ($file) {
            $name = $request->tipo.".".$request->file('imagem')->extension();
            $path = Storage::putFileAs('/', $request->file('imagem'),$name);
            if ($path) {
                $action = $imagem->update([
                    'imagem' => $name,
                    'tipo' => $request->tipo,
                ]);
            }
        }else{
            $action = $imagem->update([
                'tipo' => $request->tipo,
            ]);
        }


        if ($action) {
            return redirect()->route('imagem.index')->with('success', 'Imagem alterada com sucesso!');
        } else {
            return redirect()->route('imagem.index')->with('error', 'Imagem não pode ser alterada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagem $imagem)
    {
        Storage::delete('/'.$imagem->imagem);
        $arquivodeletado = Storage::get('/'.$imagem->imagem);

        if(!$arquivodeletado){
            $action = $imagem->delete();
        if ($action) {
            return redirect()->route('imagem.index')->with('success', 'Imagem deletado com sucesso!');
        } else {
            return redirect()->route('imagem.index')->with('error', 'Imagem não pode ser deletado!');
        }
        }
    }
}

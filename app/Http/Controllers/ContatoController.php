<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contato::all();

        return view('back.contato.index', compact(['contatos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $teste = Contato::all();
        $response = $request->all();

        if (count($teste) > 0) {
            return redirect()->route('contato.index');
        } else {
            return view('back.contato.create', compact(['response']));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'uf' => 'required',
            'telefone' => 'nullable',
            'celular' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'nullable|email',
            'localizacao' => 'nullable',
        ]);

        $action = Contato::create($request->all());
        if ($action) {
            return redirect()->route('contato.index')->with('success', 'Contato criado com sucesso!');
        } else {
            return redirect()->route('contato.index')->with('error', 'Contato não pode ser Criado!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato, Request $response)
    {

        return view('back.contato.edit', compact(['contato']));
    }

    /**
     * cep por edição
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  \App\Models\Contato      $contato
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */

    public function editcep(Request $request)
    {
        $contatoEdit = Contato::where('id', $request->contato)->first();

        $response = $request->resorce;

        return view('back.contato.edit', compact(['contatoEdit', 'response']));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contato $contato)
    {
        $validado = $request->validate([
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'uf' => 'required',
            'telefone' => 'nullable',
            'celular' => 'nullable',
            'whatsapp' => 'nullable',
            'email' => 'nullable|email',
            'localizacao' => 'nullable',
        ]);

        $action = $contato->update($request->all());
        if ($action) {
            return redirect()->route('contato.index')->with('success', 'Contato criado com sucesso!');
        } else {
            return redirect()->route('contato.index')->with('error', 'Contato não pode ser Criado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        $teste = Contato::all();
        if (count($teste) > 1) {
            $action = $contato->delete();
        }else{
            $action=false;
        }
        if ($action) {
            return redirect()->route('contato.index')->with('success', 'Contato deletado com sucesso!');
        } else {
            return redirect()->route('contato.index')->with('error', 'Contato não pode ser deletado!');
        }
    }

    /**
     * Função para buscar dados de um CEP
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function buscacep(Request $request)
    {

        $validado = $request->validate([
            'cep' => 'required|integer|digits:8',
        ]);

        $response = Http::get("https://viacep.com.br/ws/$request->cep/json/")->json();

        if (isset($response['erro'])) {
            if ($request->form == "create") {
                return redirect()->route('contato.create')->with('error', 'CEP não encontrado!!!');
            } else {
                return redirect()->route('contato.edit', $request->id)->with('error', 'CEP não encontrado!!!');
            }
        } else {
            if ($request->form == "create") {
                return redirect()->route('contato.create', $response);
            } else {
                return redirect()->route('contato.edit.cep', ['contato' => $request->id, 'resorce' => $response]);
            }
        }
    }
}

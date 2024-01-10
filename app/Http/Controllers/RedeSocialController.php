<?php

namespace App\Http\Controllers;

use App\Models\RedeSocial;
use Illuminate\Http\Request;

class RedeSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redesociais = RedeSocial::all();

        $redes = Collect([
            (object)['id' => 'YouTube', 'nome' => 'YouTube'],
            (object)['id' => 'Instagram', 'nome' => 'Instagram'],
            (object)['id' => 'Facebook', 'nome' => 'Facebook'],
            (object)['id' => 'TikTok', 'nome' => 'TikTok'],
            (object)['id' => 'LinkedIn', 'nome' => 'LinkedIn'],
            (object)['id' => 'Pinterest', 'nome' => 'Pinterest'],
            (object)['id' => 'Twitter', 'nome' => 'Twitter'],
        ])->keyBy('id')->pluck('nome', 'id');

        return view('back.redesocial.index', compact(['redesociais', 'redes']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nome' => 'required',
            'url' => 'required',
        ]);
        if ($request->nome == 'YouTube') {
            $icone = "fab fa-youtube";
        } elseif ($request->nome == 'Instagram') {
            $icone = "fab fa-instagram";
        } elseif ($request->nome == 'Facebook') {
            $icone = "fab fa-facebook-square";
        } elseif ($request->nome == 'TikTok') {
            $icone = "fab fa-tiktok";
        } elseif ($request->nome == 'LinkedIn') {
            $icone = "fab fa-linkedin";
        } elseif ($request->nome == 'Pinterest') {
            $icone = "fab fa-pinterest-square";
        } elseif ($request->nome == 'Twitter') {
            $icone = "fab fa-twitter-square";
        }

        $action = RedeSocial::create([
            'nome' => $request->nome,
            'icone' => $icone,
            'url' => $request->url,
        ]);
        if ($action) {
            return redirect()->route('redesocial.index')->with('success', 'Rede social inserido com sucesso!');
        } else {
            return redirect()->route('redesocial.index')->with('error', 'Rede social não pode ser Inserido!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedeSocial $redesocial)
    {
        $redesociais = RedeSocial::all();
        $redes = Collect([
            (object)['id' => 'YouTube', 'nome' => 'YouTube'],
            (object)['id' => 'Instagram', 'nome' => 'Instagram'],
            (object)['id' => 'Facebook', 'nome' => 'Facebook'],
            (object)['id' => 'TikTok', 'nome' => 'TikTok'],
            (object)['id' => 'LinkedIn', 'nome' => 'LinkedIn'],
            (object)['id' => 'Pinterest', 'nome' => 'Pinterest'],
            (object)['id' => 'Twitter', 'nome' => 'Twitter'],
        ])->keyBy('id')->pluck('nome', 'id');

        return view('back.redesocial.index',compact(['redesociais','redesocial','redes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RedeSocial $redesocial)
    {
        $validado = $request->validate([
            'nome'=>'required',
            'url'=>'required',
        ]);

        if ($request->nome == 'YouTube') {
            $icone = "fab fa-youtube";
        } elseif ($request->nome == 'Instagram') {
            $icone = "fab fa-instagram";
        } elseif ($request->nome == 'Facebook') {
            $icone = "fab fa-facebook-square";
        } elseif ($request->nome == 'TikTok') {
            $icone = "fab fa-tiktok";
        } elseif ($request->nome == 'LinkedIn') {
            $icone = "fab fa-linkedin";
        } elseif ($request->nome == 'Pinterest') {
            $icone = "fab fa-pinterest-square";
        } elseif ($request->nome == 'Twitter') {
            $icone = "fab fa-twitter-square";
        }

        $action = $redesocial->update([
            'nome' => $request->nome,
            'icone' => $icone,
            'url' => $request->url,
            ]);

            if ($action) {
                return redirect()->route('redesocial.index')->with('success', 'Rede social alterado com sucesso!');
            } else {
                return redirect()->route('redesocial.index')->with('error', 'Rede social não pode ser alterado!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedeSocial $redesocial)
    {
        $action = $redesocial->delete();
            if ($action) {
                return redirect()->route('redesocial.index')->with('success', 'Redesocial deletado com sucesso!');
            } else {
                return redirect()->route('redesocial.index')->with('error', 'Redesocial não pode ser deletado!');
            }
    }

    /**
     * Modificar Status da Rede Social
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  [type] $id
     *
     * @return void
     */
    public function status($id)
    {
        $redesocial = RedeSocial::findOrFail($id);
        $action = $redesocial->update([
            'status' => !$redesocial->status,
        ]);
        if ($action) {
            return redirect()->route('redesocial.index')->with('success', 'Status do Rede social Alterado com sucesso!');
        } else {
            return redirect()->route('redesocial.index')->with('error', 'Status do Rede social não pode ser Alterado!');
        }
    }

}

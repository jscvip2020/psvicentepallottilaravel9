<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();

        $dias=Collect([
            (object)['id'=>'SEG','nome'=>'SEG'],
            (object)['id'=>'TER','nome'=>'TER'],
            (object)['id'=>'QUA','nome'=>'QUA'],
            (object)['id'=>'QUI','nome'=>'QUI'],
            (object)['id'=>'SEX','nome'=>'SEX'],
            (object)['id'=>'SAB','nome'=>'SAB'],
            (object)['id'=>'DOM','nome'=>'DOM']
        ])->keyBy('id')->pluck('nome','id');

        return view('back.grupo.index',compact(['grupos','dias']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'nome'=>'required',
            'dia'=>'required',
            'hora'=>'required',
            'local'=>'required',
        ]);

        $action = Grupo::create($request->all());
            if ($action) {
                return redirect()->route('grupo.index')->with('success', 'Grupo inserido com sucesso!');
            } else {
                return redirect()->route('grupo.index')->with('error', 'Grupo não pode ser Inserido!');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        $grupos = Grupo::all();

        $dias=Collect([
            (object)['id'=>'SEG','nome'=>'SEG'],
            (object)['id'=>'TER','nome'=>'TER'],
            (object)['id'=>'QUA','nome'=>'QUA'],
            (object)['id'=>'QUI','nome'=>'QUI'],
            (object)['id'=>'SEX','nome'=>'SEX'],
            (object)['id'=>'SAB','nome'=>'SAB'],
            (object)['id'=>'DOM','nome'=>'DOM']
        ])->keyBy('id')->pluck('nome','id');

        return view('back.grupo.index',compact(['grupos','grupo','dias']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $validado = $request->validate([
            'nome'=>'required',
            'dia'=>'required',
            'hora'=>'required',
            'local'=>'required',
        ]);

        $action = $grupo->update($request->all());
            if ($action) {
                return redirect()->route('grupo.index')->with('success', 'Grupo alterado com sucesso!');
            } else {
                return redirect()->route('grupo.index')->with('error', 'Grupo não pode ser alterado!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $action = $grupo->delete();
            if ($action) {
                return redirect()->route('grupo.index')->with('success', 'Grupo deletado com sucesso!');
            } else {
                return redirect()->route('grupo.index')->with('error', 'Grupo não pode ser deletado!');
            }
    }

      /**
     * Modificar Status do Grupo
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     * @param  $id
     *
     * @return void
     */
    public function status($id)
    {
        $grupo = Grupo::findOrFail($id);
        $action = $grupo->update([
            'status' => !$grupo->status,
        ]);
        if ($action) {
            return redirect()->route('grupo.index')->with('success', 'Status do Grupo Alterado com sucesso!');
        } else {
            return redirect()->route('grupo.index')->with('error', 'Status do Grupo não pode ser Alterado!');
        }
    }
}

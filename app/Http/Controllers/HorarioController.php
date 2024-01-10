<?php

namespace App\Http\Controllers;

use App\Models\horario;
use App\Models\TipoAtendimento;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = horario::all();
        $tipoAtendimento = TipoAtendimento::all()->keyBy('id')->pluck('nome','id');
        $dias=Collect([
            (object)['id'=>'SEG','nome'=>'SEG'],
            (object)['id'=>'TER','nome'=>'TER'],
            (object)['id'=>'QUA','nome'=>'QUA'],
            (object)['id'=>'QUI','nome'=>'QUI'],
            (object)['id'=>'SEX','nome'=>'SEX'],
            (object)['id'=>'SAB','nome'=>'SAB'],
            (object)['id'=>'DOM','nome'=>'DOM']
        ])->keyBy('id')->pluck('nome','id');

        return view('back.horario.index',compact(['horarios','tipoAtendimento','dias']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $validado = $request->validate([
            'tipoatendimento_id'=>'required',
            'dia'=>'required',
            'inicio1'=>'required_unless:final1,null',
            'final1'=>'required_unless:inicio2,null',
            'inicio2'=>'required_unless:final2,null',
            'final2'=>'required_unless:inicio2,null',
        ]);

        $action = horario::create($request->all());
            if ($action) {
                return redirect()->route('horario.index')->with('success', 'Horário inserido com sucesso!');
            } else {
                return redirect()->route('horario.index')->with('error', 'Horário não pode ser Inserido!');
            }

    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(horario $horario)
    {
        $horarios = horario::all();
        //dd($horario);
        $tipoAtendimento = TipoAtendimento::all()->keyBy('id')->pluck('nome','id');
        $dias=Collect([
            (object)['id'=>'SEG','nome'=>'SEG'],
            (object)['id'=>'TER','nome'=>'TER'],
            (object)['id'=>'QUA','nome'=>'QUA'],
            (object)['id'=>'QUI','nome'=>'QUI'],
            (object)['id'=>'SEX','nome'=>'SEX'],
            (object)['id'=>'SAB','nome'=>'SAB'],
            (object)['id'=>'DOM','nome'=>'DOM']
        ])->keyBy('id')->pluck('nome','id');
        return view('back.horario.index',compact(['horario','horarios','tipoAtendimento','dias']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, horario $horario)
    {
        $validado = $request->validate([
            'tipoatendimento_id'=>'required',
            'dia'=>'required',
            'inicio1'=>'required_unless:final1,null',
            'final1'=>'required_unless:inicio2,null',
            'inicio2'=>'required_unless:final2,null',
            'final2'=>'required_unless:inicio2,null',
        ]);

        $action = $horario->update($request->all());
            if ($action) {
                return redirect()->route('horario.index')->with('success', 'Horário alterado com sucesso!');
            } else {
                return redirect()->route('horario.index')->with('error', 'Horário não pode ser alterado!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(horario $horario)
    {
        $action = $horario->delete();
            if ($action) {
                return redirect()->route('horario.index')->with('success', 'Horario deletado com sucesso!');
            } else {
                return redirect()->route('horario.index')->with('error', 'Horario não pode ser deletado!');
            }
    }
}

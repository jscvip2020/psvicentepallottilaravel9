<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\horario;
use App\Models\Tipoatendimento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TipoatendimentoController extends Controller
{
    private $secretaria;
    private $padre;
    private $grupos;
    private $confissoes;
    private $missas;


    public function __construct()
    {
        $texto1 = "secretaria";
        $texto2 = "padre";
        $texto3 = "confissoes";
        $texto4 = "missa";
        $this->secretaria = TipoAtendimento::where('nome','LIKE','%'.$texto1.'%')->first();
        $this->padre = TipoAtendimento::where('nome','LIKE','%'.$texto2.'%')->first();
        $this->confissoes = TipoAtendimento::where('nome','LIKE','%'.$texto3.'%')->first();
        $this->missas = TipoAtendimento::where('nome','LIKE','%'.$texto4.'%')->first();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atendimentos = Tipoatendimento::all();

        return view('back.tipoatendimento.index',compact(['atendimentos']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validado = $request->validate([
            'nome'=>'required|unique:tipoatendimentos,nome|min:4|max:50',
            'descricao'=>'nullable|min:10',
        ]);

        $action = Tipoatendimento::create($request->all());
            if ($action) {
                return redirect()->route('tipoatendimento.index')->with('success', 'Atendimento inserido com sucesso!');
            } else {
                return redirect()->route('tipoatendimento.index')->with('error', 'Atendimento não pode ser Inserido!');
            }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoAtendimento $tipoatendimento)
    {
        $atendimentos = Tipoatendimento::all();
        return view('back.tipoatendimento.index',compact(['tipoatendimento','atendimentos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoAtendimento $tipoatendimento)
    {
        $validado = $request->validate([
            'nome'=>'required|min:4|max:50|unique:tipoatendimentos,nome,'.$tipoatendimento->id,
            'descricao'=>'nullable|min:10',
        ]);

        $action = $tipoatendimento->update($request->all());
            if ($action) {
                return redirect()->route('tipoatendimento.index')->with('success', 'Atendimento alterado com sucesso!');
            } else {
                return redirect()->route('tipoatendimento.index')->with('error', 'Atendimento não pode ser alterado!');
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoAtendimento $tipoatendimento)
    {
        $action = $tipoatendimento->delete();
            if ($action) {
                return redirect()->route('tipoatendimento.index')->with('success', 'Atendimento deletado com sucesso!');
            } else {
                return redirect()->route('tipoatendimento.index')->with('error', 'Atendimento não pode ser deletado!');
            }
    }

    public function secretaria()
    {
        if($this->secretaria){
            $atendimento_full = $this->secretaria;
        }else{
            $atendimento_full="";
        }

        return view('paginas.atendimentos',compact(['atendimento_full']));
    }
    public function padre()
    {
        if($this->padre){
            $atendimento_full = $this->padre;
        }
        return view('paginas.atendimentos',compact(['atendimento_full']));
    }
    public function missas()
    {
        if($this->missas){
            $atendimento_full = $this->missas;
        }
        return view('paginas.atendimentos',compact(['atendimento_full']));
    }
    public function confissao()
    {
        if($this->confissoes){
            $atendimento_full = $this->confissoes;
        }
        return view('paginas.atendimentos',compact(['atendimento_full']));
    }
    public function grupos()
    {
        $grupos = Grupo::where('status',1)->get();
        return view('paginas.grupos',compact(['grupos']));
    }

}

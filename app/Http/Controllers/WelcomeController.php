<?php

namespace App\Http\Controllers;

use App\Mail\Contato;
use App\Mail\RespostaContato;
use App\Models\Chamada;
use App\Models\Contato as ModelsContato;
use App\Models\Grupo;
use App\Models\TipoAtendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{

    /**
     * Retorna Welcome pagina
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     *
     * @return void
     */
    public function index()
    {

        $images = Chamada::where('status', 1)->get();
        $atendimentos = TipoAtendimento::all();
        $grupos = Grupo::all();


        return view('welcome', compact(['images', 'atendimentos', 'grupos']));
    }

    public function send(Request $request)
    {

        $email = ModelsContato::pluck('email')->first();

        $validado = $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email',
            'assunto' => 'required|min:10',
            'mensagem' => 'required|min:20',
        ]);



        $send = Mail::to(($email)?$email:'jscvip@gmail.com', env('APP_NAME'))->send(new Contato([
            'fromName' => $request->nome." ".$request->sobrenome,
            'fromEmail' => $request->email,
            'assunto' => $request->assunto,
            'mensagem' => $request->mensagem,
        ]));
        $sendResposta = Mail::to( $request->email,  $request->nome." ".$request->sobrenome)->send(new RespostaContato([
            'fromName' =>env('APP_NAME'),
            'fromEmail' =>($email)?$email:'jscvip@gmail.com',
            'assunto' => 'Recebemos seu contato',
        ]));

        return redirect()->route('pages.contatos')->with('success','Email Enviado com sucesso!');
    }
}

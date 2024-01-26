<?php

namespace App\Providers;

use App\Models\Contato;
use App\Models\RedeSocial;
use App\Models\Tipoatendimento;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if($this->app->environment('production')) {
            $this->app['request']->server->set('HTTPS','on');
            URL::forceScheme('https');
        }

        view()->composer(['layouts.footer', 'layouts.navigationfront'], function ($view) {
            $redes = RedeSocial::where('status', 1)->get();
            $view->with(['redes' => $redes]);
        });

        view()->composer('layouts.navigationfront', function ($view) {
            $menus = [
                ['text' => 'Inicio', 'link' => '/'],
                ['text' => 'Padroeiro', 'link' => route('pages.padroeiro')],
                ['text' => 'Contato', 'link' => route('pages.contatos')],
            ];
            $atendimentos = Tipoatendimento::all();

            $view->with(['menus' => $menus, 'atendimentos' => $atendimentos]);
        });
        view()->composer(['layouts.navigation', 'dashboard'], function ($view) {
            $menusDash = [
                ['text' => 'Tipoatendimento', 'route' => 'tipoatendimento.index', 'link' => route('tipoatendimento.index')],
                ['text' => 'Horário', 'route' => 'horario.index', 'link' => route('horario.index')],
                ['text' => 'Chamada', 'route' => 'chamada.index', 'link' => route('chamada.index')],
                ['text' => 'Grupo', 'route' => 'grupo.index', 'link' => route('grupo.index')],
                ['text' => 'Imagem', 'route' => 'imagem.index', 'link' => route('imagem.index')],
                ['text' => 'Contato', 'route' => 'contato.index', 'link' => route('contato.index')],
                ['text' => 'Doação', 'route' => 'doacao.index', 'link' => route('doacao.index')],
                ['text' => 'Redes Sociais', 'route' => 'redesocial.index', 'link' => route('redesocial.index')],
            ];
            $view->with('menusDash', $menusDash);
        });
        view()->composer(['layouts.front'], function ($view) {
            $contatoFront = Contato::where('whatsapp', 1)->first();
            $t = ['(', ')', ' ', '-'];
            if (isset($contatoFront)) {
                $whatsapp = str_replace($t, '', $contatoFront->celular);
            }else{
                $whatsapp = "";
            }
            $view->with('whatsapp', $whatsapp);
        });
    }
}

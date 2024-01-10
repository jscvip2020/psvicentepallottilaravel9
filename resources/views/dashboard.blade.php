<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-center">
                @foreach ($menusDash as $key => $menu)
                    <a href="{{ $menu['link'] }}"
                        class="block m-1 text-center max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        @if ($menu['text'] == 'Tipoatendimento')
                            <span class="fas fa-person-praying text-5xl text-red-700"></span>
                        @elseif($menu['text'] == 'Horário')
                            <span class="fas fa-clock text-5xl text-blue-950"></span>
                        @elseif($menu['text'] == 'Chamada')
                            <span class="fas fa-images text-5xl text-violet-900"></span>
                        @elseif($menu['text'] == 'Grupo')
                            <span class="fas fa-group-arrows-rotate text-5xl text-orange-900"></span>
                        @elseif($menu['text'] == 'Imagem')
                            <span class="fas fa-images text-5xl text-green-800"></span>
                        @elseif($menu['text'] == 'Contato')
                            <span class="fas fa-money-check text-5xl text-cyan-800"></span>
                        @elseif($menu['text'] == 'Doação')
                            <span class="fas fa-money-bill-1-wave text-5xl text-purple-950"></span>
                        @elseif($menu['text'] == 'Redes Sociais')
                            <span class="fab fa-connectdevelop text-5xl text-red-950"></span>
                        @endif
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $menu['text'] }}
                        </h5>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<div class="text-white flex bg-gray-800 lg:hidden ">
    <div class="flex flex-1 items-center justify-center mt-4">
        @forelse($redes as $rede)
            <a href="{{ $rede->url }}" title="{{ $rede->nome }}"><i class="{{ $rede->icone }} text-3xl pr-2"></i></a>
        @empty
        @endforelse
    </div>
</div>
<div class="text-white text-2xl flex bg-gray-800 lg:hidden">
    <div class="flex flex-1 items-center justify-center">
        <a href="{{ route('pages.doacao') }}">
            <button
                class="bg-red-800 hover:bg-red-500 font-bold mt-2 mb-2 py-1 px-4 rounded-full inline-flex items-center">
                <span class="fas fa-heart pr-3"></span>
                <span>Faça sua Doação</span>
            </button>
        </a>
    </div>
</div>
<div class="text-white bg-gray-800 text-2xl flex sm:hidden">
    <div class="flex flex-1 items-center justify-center">Paróquia São Vicente Pallotti</div>
</div>
<nav x-data="{ dropdown: false }" class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" x-on:click="dropdown = ! dropdown"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <x-application-logo class="block h-12 w-auto fill-current text-gray-800" />
                    <div
                        class="hidden text-lg sm:block text-white absolute inset-y-0 right-0 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        Paróquia São Vicente Pallotti
                    </div>
                </div>

                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        @foreach ($menus as $key => $value)
                            <a href="{{ $value['link'] }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white active:bg-gray-900 active:text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">{{ $value['text'] }}</a>
                        @endforeach
                        @isset($atendimentos)
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex text-gray-300 hover:bg-gray-700 hover:text-white active:bg-gray-900 active:text-white rounded-md px-3 py-2 text-sm font-medium">
                                        <div>Atendimentos</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    @foreach ($atendimentos as $atendimento)
                                        <x-dropdown-link :href="route($atendimento->link)">
                                            {{ __($atendimento->nome) }}
                                        </x-dropdown-link>
                                    @endforeach
                                </x-slot>
                            </x-dropdown>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="hidden text-lg lg:block text-white absolute inset-y-0 right-0 items-center pr-2 lg:static lg:inset-auto sm:ml-6 lg:pr-0">
                <a href="{{ route('pages.doacao') }}">
                    <button
                    class="bg-red-800 hover:bg-red-500 font-bold py-1 px-4 rounded-full inline-flex items-center">
                    <span class="fas fa-heart pr-3"></span>
                    <span>Faça sua Doação</span>
                </button>
            </a>
        </div>
        <div class="hidden text-lg lg:block text-white absolute inset-y-0 right-0 items-center pr-2 lg:static lg:inset-auto sm:ml-6 lg:pr-0">
            @forelse($redes as $rede)
            <a href="{{ $rede->url }}" title="{{ $rede->nome }}"><i class="{{ $rede->icone }} text-3xl pr-2"></i></a>
        @empty
        @endforelse
        </div>
        </div>
    </div>


    <div x-show="dropdown" class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            @foreach ($menus as $key => $value)
                <a href="{{ $value['link'] }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white active:bg-gray-900 active:text-white block rounded-md px-3 py-2 text-base font-medium">{{ $value['text'] }}</a>
            @endforeach
            @foreach ($atendimentos as $atendimento)
                <a href="{{ route($atendimento->link) }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white active:bg-gray-900 active:text-white block rounded-md px-3 py-2 text-base font-medium">{{ __($atendimento->nome) }}</a>
            @endforeach
        </div>
    </div>
</nav>

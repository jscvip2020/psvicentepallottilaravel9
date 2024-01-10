<x-front-layout>
    <x-slot:title>{{ $atendimento_full->nome }}</x-slot>
    <x-slot:description>Página {{ $atendimento_full->nome }}</x-slot>
    <x-slot:imagemface>
        @if (request()->routeIs('missas'))
            @if (file_exists('images/missa.png'))
                {{ asset('images/missa.png') }}
            @elseif(file_exists('images/missa.jpg'))
                {{ asset('images/missa.jpg') }}
            @else
                {{ asset('images/quadradodefault.png') }}
            @endif
        @endif
        @if (request()->routeIs('atendimento.secretaria'))
            @if (file_exists('images/secretaria.png'))
                {{ asset('images/secretaria.png') }}
            @elseif(file_exists('images/secretaria.jpg'))
                {{ asset('images/secretaria.jpg') }}
            @else
                {{ asset('images/quadradodefault.png') }}
            @endif
        @endif

        @if (request()->routeIs('atendimento.padre'))
            @if (file_exists('images/atendimento.png'))
                {{ asset('images/atendimento.png') }}
            @elseif(file_exists('images/atendimento.jpg'))
                {{ asset('images/atendimento.jpg') }}
            @else
                {{ asset('images/quadradodefault.png') }}
            @endif
        @endif

        @if (request()->routeIs('atendimento.confissao'))
            @if (file_exists('images/confissao.png'))
                {{ asset('images/confissao.png') }}
            @elseif(file_exists('images/confissao.jpg'))
                {{ asset('images/confissao.jpg') }}
            @else
                {{ asset('images/quadradodefault.png') }}
            @endif
        @endif
    </x-slot>
    <div class="container mb-5">
        <h1 class="flex justify-center font-black  text-blue-900 text-4xl">{{ $atendimento_full->nome }}</h1>
    </div>
    <div class="container mr-auto md:flex md:max-h-[400px]">
        <div class="md:w-1/2 flex justify-center">
            <img class="grayscale"
                @if (request()->routeIs('missas')) @if (file_exists('images/missa.png'))
                src="{{ asset('images/missa.png') }}"
                @elseif(file_exists('images/missa.jpg'))
                src="{{ asset('images/missa.jpg') }}"
                @else
                src="{{ asset('images/quadradodefault.png') }}" @endif
                alt="Horário das missas" @endif
            @if (request()->routeIs('atendimento.secretaria')) @if (file_exists('images/secretaria.png'))
            src="{{ asset('images/secretaria.png') }}"
            @elseif(file_exists('images/secretaria.jpg'))
            src="{{ asset('images/secretaria.jpg') }}"
            @else
            src="{{ asset('images/quadradodefault.png') }}" @endif
            alt="Atendimento Secretaria" @endif

            @if (request()->routeIs('atendimento.padre')) @if (file_exists('images/atendimento.png'))
            src="{{ asset('images/atendimento.png') }}"
            @elseif(file_exists('images/atendimento.jpg'))
            src="{{ asset('images/atendimento.jpg') }}"
            @else
            src="{{ asset('images/quadradodefault.png') }}" @endif
            alt="Atendimento Padre" @endif

            @if (request()->routeIs('atendimento.confissao')) @if (file_exists('images/confissao.png'))
            src="{{ asset('images/confissao.png') }}"
            @elseif(file_exists('images/confissao.jpg'))
            src="{{ asset('images/confissao.jpg') }}"
            @else
            src="{{ asset('images/quadradodefault.png') }}" @endif
            alt="Atendimento Confissão" @endif
            >
        </div>
        <div class="md:w-1/2 p-10 flex items-center">
            <p class="md:text-3xl">{{ $atendimento_full->descricao }}</p>
            <ul class="md:text-2xl">
                @foreach ($atendimento_full->horarios as $horario)
                    <li>
                        <span class="font-black w-14 inline-block"> {{ $horario->dia }}</span>
                        <span> @isset($horario->inicio1)
                                {{ date('H\hi', strtotime($horario->inicio1)) }}
                            @endisset
                        </span>
                        <span> @isset($horario->final1)
                                às {{ date('H\hi', strtotime($horario->final1)) }}
                            @endisset
                        </span>
                        <span>
                            @isset($horario->inicio2)
                                - {{ date('H\hi', strtotime($horario->inicio2)) }}
                            @endisset
                        </span>
                        <span>
                            @isset($horario->final2)
                                às {{ date('H\hi', strtotime($horario->final2)) }}
                            @endisset
                        </span>
                        <span>{{ $horario->descricao }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-front-layout>

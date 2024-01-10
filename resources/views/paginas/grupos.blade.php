<x-front-layout>
    <x-slot:title>{{ __('Grupos') }}</x-slot>
    <x-slot:description>Página dos Grupo da paróquia</x-slot>
    <x-slot:imagemface>
        @if (file_exists('images/grupos.jpg'))
                {{ asset('images/grupos.jpg') }}
            @elseif(file_exists('images/grupos.png'))
                {{ asset('images/grupos.png') }}
            @else
                {{ asset('images/quadradodefault.png') }}
            @endif

    </x-slot>

    <div class="container mb-5">
        <h1 class="flex justify-center font-black  text-blue-900 text-4xl">{{ __('Grupos') }}</h1>
    </div>
    <div class="container mr-auto md:flex md:max-h-[400px]">
        <div class="md:w-1/2 flex justify-center">
            @if (file_exists('images/grupos.jpg'))
                <img class="grayscale" src="{{ asset('images/grupos.jpg') }}" alt="Grupos">
            @elseif(file_exists('images/grupos.png'))
                <img class="grayscale" src="{{ asset('images/grupos.png') }}" alt="Grupos">
            @else
                <img class="grayscale" src="{{ asset('images/quadradodefault.png') }}" alt="Grupos">
            @endif

        </div>
        <div class="md:w-1/2 p-10 items-center">

            @foreach ($grupos as $grupo)
                <div class="mb-10">
                    <p class="md:text-3xl font-black text-red-900">{{ $grupo->nome }}</p>
                    <p class="md:text-3xl"><i class="fas fa-calendar-days text-orange-500"></i><b> {{ $grupo->dia }}
                        </b>{{ date('H\hi', strtotime($grupo->hora)) }}</p>
                    <p class="md:text-3xl"><i class="fas fa-location-dot text-blue-600"> </i> {{ $grupo->local }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-front-layout>

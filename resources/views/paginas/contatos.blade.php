<x-front-layout>
    <x-slot:title>Contatos</x-slot>
    <x-slot:description>Página de contatos com a paróquia</x-slot>
    <x-slot:imagemface>
        @if (file_exists('images/imgcontato.png'))
                {{ asset('images/imgcontato.png') }}
            @elseif (file_exists('images/imgcontato.jpg'))
                {{ asset('images/imgcontato.jpg') }}
            @else
                {{ asset('images/imagemdefault.png') }}
            @endif
    </x-slot>


    <div class="container">
        <h1 class="flex justify-center font-black  text-blue-900 text-4xl">Contate-nos</h1>
    </div>
    <div class="container mr-auto md:flex max-h-[380px]">
        <div class="md:w-1/2 p-5">
            @if (file_exists('images/imgcontato.png'))
                <img class="w-full md:object-cover h-[380px] md:h-full" src="{{ asset('images/imgcontato.png') }}"
                    alt="Igreja São Vicente Pallotti">
            @elseif (file_exists('images/imgcontato.jpg'))
                <img class="w-full md:object-cover h-[380px] md:h-full" src="{{ asset('images/imgcontato.jpg') }}"
                    alt="Igreja São Vicente Pallotti">
            @else
                <img class="w-full md:object-cover h-[380px] md:h-full" src="{{ asset('images/imagemdefault.png') }}"
                    alt="Igreja São Vicente Pallotti">
            @endif
        </div>
        <div class="md:w-1/2 p-5">
            <ul>
                <li class="mb-6 flex items-center text-left">
                    <i class="fas fa-location-dot mr-4 text-3xl flex"></i>
                    <div class="font-serif text-base md:text-lg">
                        @forelse ($contatos as $contato)
                            @php
                                $teste = ['(', ')', ' ', '-'];
                            @endphp
                            <span class="block text-xs uppercase">Endereço:</span>
                            <span class="block">{{ $contato->logradouro }}, {{ $contato->numero }}</span>
                            <span class="block">{{ $contato->bairro }}</span>
                            <span class="block">{{ $contato->cep }} -
                                {{ $contato->localidade }}-{{ $contato->uf }}.</span>
                    </div>
                </li>
                @if (isset($contato->telefone))
                    <li class="mb-6 flex items-center text-left">
                        <i class="fas fa-phone mr-4 text-3xl flex"></i>
                        <div>
                            <span class="block text-xs uppercase">Fone:</span>
                            <a class="cursor-pointer font-serif text-base md:text-lg"
                                href="tel:55{{ str_replace($teste, '', $contato->telefone) }}">
                                {{ $contato->telefone }} (Secretaria)
                            </a>
                            <span class="block text-xs uppercase mt-4">celular:</span>
                            <a class="cursor-pointer font-serif text-base md:text-lg"
                                href="tel:55{{ str_replace($teste, '', $contato->celular) }}">
                                {{ $contato->celular }}
                            </a>
                        </div>
                    </li>
                @endif
                @if ($contato->whatsapp)
                    <li class="mb-6 flex items-center text-left">
                        <i class="fab fa-whatsapp opacity-0 mr-4 text-3xl flex"></i>
                        <div>
                            <span class="block text-xs uppercase">Whasapp:</span>
                            <a class="cursor-pointer font-serif text-base md:text-lg"
                                href="https://wa.me/55{{ str_replace($teste, '', $contato->celular) }}">
                                <img class="h-12" src="{{ asset('images/WhatsAppButton.png') }}">
                            </a>
                        </div>
                    </li>
                @endif
                @if (isset($contato->email))
                    <li class="mb-6 flex items-center text-left">
                        <i class="fas fa-envelope mr-4 text-3xl flex"></i>
                        <div>
                            <span class="block text-xs uppercase">email</span>
                            <a class="cursor-pointer font-serif text-base md:text-lg"
                                href="mailto:{{ $contato->email }}">
                                {{ $contato->email }}
                            </a>
                        </div>
                    </li>
                @endif
            @empty
                @endforelse
            </ul>
        </div>
    </div>
    <div class="container mr-auto md:flex">
        <div class="md:w-1/2 p-10">
            <x-message></x-message>
            <h2 class="text-center border-b-2 mb-4 text-2xl border-b-orange-950">Deixe-nos uma mensagem</h2>
            <form action="{{ route('contato.send') }}" method="POST" class="w-full">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="nome">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            name="nome" value="{{ old('nome') }}" id="nome" type="text">
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="Seu nome" />
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="sobrenome">
                            Sobrenome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="sobrenome" value="{{ old('sobrenome') }}" id="sobrenome" type="text">
                            <x-input-error :messages="$errors->get('sobrenome')" class="mt-2" texto="Seu Sobrenome" />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="email">
                            E-mail
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="email" value="{{ old('email') }}" id="email" type="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" texto="Seu Email" />

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="assunto">
                            Assunto
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            name="assunto" value="{{ old('assunto') }}" id="assunto" type="assunto">
                            <x-input-error :messages="$errors->get('assunto')" class="mt-2" texto="Seu Assunto" />

                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="mensagem">
                            Mensagem
                        </label>
                        <textarea
                            class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                            name="mensagem" id="mensagem">{{ old('mensagem') }}</textarea>
                            <x-input-error :messages="$errors->get('mensagem')" class="mt-2" texto="Sua mensagem" />
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3">
                        <button
                            class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Enviar
                        </button>
                    </div>
                    <div class="md:w-2/3"></div>
                </div>
            </form>
        </div>
        <div class="md:w-1/2 p-10">
            <iframe class="w-full md:h-full min-h-[350px]"
                @forelse ($contatos as $c) src="{{ $c->localizacao }}"
            @empty @endforelse style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</x-front-layout>

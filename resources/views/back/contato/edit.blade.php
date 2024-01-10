<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando Contatos') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-message></x-message>

                <form class="md:flex w-full" method="POST" action="{{ route('contato.buscacep') }}">
                    <input name="form" type="hidden" value="edit">
                    <input name="id" type="hidden" value="{{(isset($contato->id)) ? $contato->id : $contatoEdit->id}}">
                    @csrf
                    <div class="m-4 md:w-1/3">
                        <x-input-label for="cep" :value="__('CEP')" />
                        <div class="relative">
                            <x-text-input id="cep" type="text" name="cep" :value="old('cep')"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="CEP" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar
                                CEP</button>
                        </div>
                        <x-input-error :messages="$errors->get('cep')" class="mt-2" texto="Digite o CEP Ex:00000000" />
                    </div>
                </form>

                    <form class="md:flex w-full flex-col" method="POST" action="{{ route('contato.update',(isset($contato->id)) ? $contato->id : $contatoEdit->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 ml-4 md:w-1/2">
                            <x-input-label for="cep" :value="__('CEP')" />
                            <x-text-input id="cep" class="block w-full" type="text" name="cep"
                                value="{{ old('cep') ? old('cep') : (isset($response['cep']) ? $response['cep'] : $contato->cep) }}"
                                readonly />
                        </div>
                        <div class="md:flex mb-2">
                            <div class="md:w-1/2 ml-4">
                                <x-input-label for="logradouro" :value="__('logradouro')" />
                                <x-text-input id="logradouro" class="block w-full" type="text" name="logradouro"
                                    value="{{ old('logradouro') ? old('logradouro') : (isset($response['logradouro']) ? $response['logradouro'] : $contato->logradouro) }}"
                                    readonly />
                            </div>
                            <div class="ml-2 mr-4">
                                <x-input-label for="numero" :value="__('numero')" />
                                <x-text-input id="numero" class="block w-full" type="text" name="numero"
                                    value="{{old('numero') ? old('numero') : ((isset($contato->numero)) ? $contato->numero : $contatoEdit->numero)}}" autofocus />
                                <x-input-error :messages="$errors->get('numero')" class="mt-2" texto="" />
                            </div>
                        </div>
                        <div class="md:flex mb-2">
                            <div class="ml-4">
                                <x-input-label for="bairro" :value="__('Bairro')" />
                                <x-text-input id="bairro" class="block w-full" type="text" name="bairro"
                                    value="{{ old('bairro') ? old('bairro') : (isset($response['bairro']) ? $response['bairro'] : $contato->bairro) }}"
                                    readonly />
                            </div>
                            <div class="ml-2">
                                <x-input-label for="localidade" :value="__('Cidade')" />
                                <x-text-input id="localidade" class="block w-full" type="text" name="localidade"
                                    value="{{ old('localidade') ? old('localizade') : (isset($response['localidade']) ? $response['localidade'] : $contato->localidade) }}"
                                    readonly />
                            </div>
                            <div class="mr-4 ml-2">
                                <x-input-label for="uf" :value="__('UF')" />
                                <x-text-input id="uf" class="block w-full" type="text" name="uf"
                                    value="{{ old('uf') ? old('uf') : (isset($response['uf']) ? $response['uf'] : $contato->uf) }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="md:flex mb-2">
                            <div class="mr-4 ml-4">
                                <x-input-label for="telefone" :value="__('Telefone')" />
                                <x-text-input id="telefone" class="block w-full phone" type="text"
                                    name="telefone" value="{{ old('telefone') ? old('telefone') : ((isset($contato->telefone)) ? $contato->telefone : $contatoEdit->telefone) }}" />
                            </div>
                            <div class="mr-4 ml-2">
                                <x-input-label for="celular" :value="__('Celular')" />
                                <x-text-input id="celular" class="block w-full mobile" type="text" name="celular"
                                    value="{{ old('celular') ? old('celular') : ((isset($contato->celular)) ? $contato->celular : $contatoEdit->celular) }}" />
                            </div>
                            <div class="mr-4 ml-2">
                                <x-input-label for="whatsapp" :value="__('Whatsapp')" />
                                <input id="whatsapp" class="form-checkbox" type="checkbox" name="whatsapp"
                                    value="1" {{ ((isset($contato->whatsapp) && $contato->whatsapp==1) || $contatoEdit->whatsapp==1) ? "checked" : ""}}/>
                            </div>
                        </div>
                        <div class="md:w-1/2 ml-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block w-full" type="email" name="email"
                                value="{{ old('email') ? old('email') : ((isset($contato->email)) ? $contato->email : $contatoEdit->email) }}"/>
                                <x-input-error :messages="$errors->get('localizacao')" class="mt-2" texto="" />

                        </div>
                        <div class="m-4">
                            <x-input-label for="localizacao" :value="__('Localização')" />
                            <x-text-input id="localizacao" class="block w-full" type="text" name="localizacao"
                                value="{{ old('localizacao') ? old('localizacao') : ((isset($contato->localizacao)) ? $contato->localizacao : $contatoEdit->localizacao) }}" />
                            <x-input-error :messages="$errors->get('localizacao')" class="mt-2" texto="" />
                        </div>

                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Editar') }}
                            </x-primary-button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
        <script>
            $(document).ready(function($) {
                $('.phone').inputmask('(99) 9999-9999');
                $('.mobile').inputmask('(99) 99999-9999');
            });


        </script>

    </x-slot>
</x-app-layout>

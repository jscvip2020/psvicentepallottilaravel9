<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Imagens') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <x-message></x-message>
                @if (request()->routeIs('popup.index'))
                    <form class="md:flex w-full" method="POST" enctype="multipart/form-data"
                        action="{{ route('popup.store') }}">
                        @csrf
                        <div class="m-4">
                            <x-input-label for="popup" :value="__('Imagem da Popup')" />
                            <x-text-input id="imagem" class="block w-full" type="file" name="imagem"
                                accept="image/jpeg, image/png" />
                            <x-input-error :messages="$errors->get('imagem')" class="mt-2"
                                texto="Escolha uma imagem JPG ou PNG com ratio de 1:1" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="nome" :value="__('Nome do Popup')" />
                            <x-text-input id="nome" class="block w-full" type="text" name="nome"
                                :value="old('nome')" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="url" :value="__('Url do Popup')" />
                            <x-text-input id="url" class="block w-full" type="text" name="url"
                                :value="old('url')" />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dataini" :value="__('Data Inicio')" />
                            <x-text-input id="dataini" class="block w-full" type="date" name="dataini"
                                :value="(old('dataini'))?old('dataini'):date('Y-m-d')" />
                            <x-input-error :messages="$errors->get('dataini')" class="mt-2" texto="Inicio da exibição" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="datafim" :value="__('Data Final')" />
                            <x-text-input id="datafim" class="block w-full" type="date" name="datafim"
                                :value="old('datafim')" />
                            <x-input-error :messages="$errors->get('datafim')" class="mt-2" texto="Finalizar a Exibição" />
                        </div>
                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                @else
                    <form class="md:flex w-full" method="POST" enctype="multipart/form-data"
                        action="{{ route('popup.update', $popup->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="m-4">
                            <img src="{{ asset('images/popup/' . $popup->imagem) }}" width="120">
                        </div>

                        <div class="m-4">
                            <x-input-label for="imagem" :value="__('Imagem da Popup')" />
                            <x-text-input id="imagem" class="block w-full" type="file" name="imagem"
                                accept="image/jpeg, image/png" />
                            <x-input-error :messages="$errors->get('imagem')" class="mt-2" texto="Escolha uma imagem JPG ou PNG com ratio de 1:1" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="nome" :value="__('Nome do Popup')" />
                            <x-text-input id="nome" class="block w-full" type="text" name="nome"
                                :value="$popup->nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="url" :value="__('Url do Popup')" />
                            <x-text-input id="url" class="block w-full" type="text" name="url"
                                :value="$popup->url" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dataini" :value="__('Data Inicio')" />
                            <x-text-input id="dataini" class="block w-full" type="date" name="dataini"
                                :value="$popup->dataini" />
                            <x-input-error :messages="$errors->get('dataini')" class="mt-2" texto="Inicio da Exibição" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="datafim" :value="__('Data Final')" />
                            <x-text-input id="datafim" class="block w-full" type="date" name="datafim"
                                :value="$popup->datafim" />
                            <x-input-error :messages="$errors->get('datafim')" class="mt-2" texto="Fim da Exibição" />
                        </div>

                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Alterar') }}
                            </x-primary-button>
                        </div>
                    </form>
                @endif


            </div>
            <div class="bg-white overflow-hidden mt-4 shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                @if (count($popupAll) >= 0)
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr class="bg-blue-800">
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Nome
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Inicio
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Final
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Status
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Ação
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($popupAll as $item)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="flex justify-center items-center  py-1 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        <img width="120"
                                                            src="{{ asset('images/popup/' . $item->imagem) }}">
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $item->nome }}</td>

                                                        <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $item->dataini }}</td>

                                                        <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $item->datafim }}</td>

                                                        <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            <x-status :id="$item->id" :value="$item->status" model="popup"></x-status>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('popup.edit', $item->id) }}"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-pen-to-square"></i>
                                                        </a>

                                                        <button data-modal-target="deleteModal{{ $item->id }}"
                                                            data-modal-toggle="deleteModal{{ $item->id }}"
                                                            type="button"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-trash-can"></i>
                                                        </button>
                                                        @php
                                                            $route = 'popup.destroy';
                                                        @endphp
                                                        <x-modal-delete :route="$route"
                                                            :tipoId="$item->id"></x-modal-delete>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="w-full text-center">
                                        Nenhum dado encontrado em POPUP.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>

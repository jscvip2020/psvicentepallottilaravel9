<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chamadas') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <x-message></x-message>
                @if (request()->routeIs('chamada.index'))
                    <form class="md:flex w-full" method="POST" enctype="multipart/form-data" action="{{ route('chamada.store') }}">
                        @csrf
                        <div class="m-4">
                            <x-input-label for="imagem" :value="__('Imagem da Chamada')" />
                            <x-text-input id="imagem" class="block w-full" type="file" name="imagem"
                                 accept="image/jpeg, image/png"/>

                            <x-input-error :messages="$errors->get('imagem')" class="mt-2" texto="Escolha uma imagem com ratio de 16/9."/>
                        </div>

                        <div class="m-4">
                            <x-input-label for="url" :value="__('URL')" />
                            <x-text-input id="url" class="block w-full" type="text" name="url"
                                :value="old('url')" />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" texto="" />
                        </div>

                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                @else
                    <form class="md:flex w-full" method="POST" enctype="multipart/form-data" action="{{ route('chamada.update', $chamada->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="m-4">
                            <img src="{{asset('images/chamadas/'.$chamada->imagem)}}" width="200">
                        </div>

                        <div class="m-4">
                            <x-input-label for="imagem" :value="__('Imagem da Chamada')" />
                            <x-text-input id="imagem" class="block w-full" type="file" name="imagem"
                                accept="image/jpeg, image/png" />
                            <x-input-error :messages="$errors->get('imagem')" class="mt-2" texto="Escolha uma imagem com ratio de 16/9." />
                        </div>

                        <div class="m-4">
                            <x-input-label for="url" :value="__('URL')" />
                            <x-text-input id="url" class="block w-full" type="text" name="url"
                                :value="$chamada->url" />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" texto="" />
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
                                @if (count($chamadas) > 0)
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr class="bg-blue-800">
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    URL
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Ação
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($chamadas as $chamadaT)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="flex justify-center items-center  py-1 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        <img width="220" src="{{asset('images/chamadas/'.$chamadaT->imagem)}}"></td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $chamadaT->url }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                            <x-status :id="$chamadaT->id" :value="$chamadaT->status" model="chamada"></x-status>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('chamada.edit', $chamadaT->id) }}"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-pen-to-square"></i>
                                                        </a>

                                                        <button data-modal-target="deleteModal{{ $chamadaT->id }}"
                                                            data-modal-toggle="deleteModal{{ $chamadaT->id }}"
                                                            type="button"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-trash-can"></i>
                                                        </button>
                                                        @php
                                                            $route = 'chamada.destroy';
                                                        @endphp
                                                        <x-modal-delete :route="$route"
                                                            :tipoId="$chamadaT->id"></x-modal-delete>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="w-full text-center">
                                        Nenhum dado encontrado em Chamadas.
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

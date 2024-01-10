<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grupos') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <x-message></x-message>
                @if (request()->routeIs('grupo.index'))
                    <form class="md:flex w-full" method="POST" action="{{ route('grupo.store') }}">
                        @csrf

                        <div class="m-4">
                            <x-input-label for="nome" :value="__('Nome do grupo')" />
                            <x-text-input id="nome" class="block w-full" type="text" name="nome"
                                :value="old('nome')" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dia" :value="__('Dia')" />
                            <x-select-input id="dia" class="block w-full" name="dia" :options="$dias"
                                :value="old('dia')" required />
                            <x-input-error :messages="$errors->get('dia')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="hora" :value="__('Horário')" />
                            <x-text-input id="hora" class="block w-full" type="time" name="hora"
                                :value="old('hora')" />
                            <x-input-error :messages="$errors->get('hora')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="local" :value="__('Local')" />
                            <x-text-input id="local" class="block w-full" type="text" name="local"
                                :value="old('local')" />
                            <x-input-error :messages="$errors->get('local')" class="mt-2" texto="" />
                        </div>

                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                @else
                    <form class="md:flex w-full" method="POST" action="{{ route('grupo.update', $grupo->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="m-4">
                            <x-input-label for="nome" :value="__('Nome do grupo')" />
                            <x-text-input id="nome" class="block w-full" type="text" name="nome"
                                :value="$grupo->nome" />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dia" :value="__('Dia')" />
                            <x-select-input id="dia" class="block w-full" name="dia" :options="$dias"
                                :value="$grupo->dia" required />
                            <x-input-error :messages="$errors->get('dia')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="hora" :value="__('Horário')" />
                            <x-text-input id="hora" class="block w-full" type="time" name="hora"
                                :value="$grupo->hora" />
                            <x-input-error :messages="$errors->get('hora')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="local" :value="__('Local')" />
                            <x-text-input id="local" class="block w-full" type="text" name="local"
                                :value="$grupo->local" />
                            <x-input-error :messages="$errors->get('local')" class="mt-2" texto="" />
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
                                @if (count($grupos) > 0)
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr class="bg-blue-800">
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Nome do Grupo
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Dia
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Horário</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Local</th>
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
                                            @foreach ($grupos as $tipo)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->nome }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->dia }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        @isset($tipo->hora)
                                                            {{ date('H:i', strtotime($tipo->hora)) }}
                                                        @endisset
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->local }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        <x-status :id="$tipo->id" :value="$tipo->status" model="grupo"></x-status>
                                                    </td>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('grupo.edit', $tipo->id) }}"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-pen-to-square"></i>
                                                        </a>

                                                        <button data-modal-target="deleteModal{{ $tipo->id }}"
                                                            data-modal-toggle="deleteModal{{ $tipo->id }}"
                                                            type="button"
                                                            class="inline-flex items-center gap-x-2 text-xl font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            <i class="fas fa-trash-can"></i>
                                                        </button>
                                                        @php
                                                            $route = 'grupo.destroy';
                                                        @endphp
                                                        <x-modal-delete :route="$route"
                                                            :tipoId="$tipo->id"></x-modal-delete>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="w-full text-center">
                                        Nenhum dado encontrado em Grupos.
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

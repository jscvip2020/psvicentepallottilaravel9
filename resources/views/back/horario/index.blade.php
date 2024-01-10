<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horarios') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <x-message></x-message>
                @if (request()->routeIs('horario.index'))
                    <form class="md:flex w-full" method="POST" action="{{ route('horario.store') }}">
                        @csrf
                        <div class="m-4">
                            <x-input-label for="tipoatendimento_id" :value="__('Atendimento')" />
                            <x-select-input id="tipoatendimento_id" class="block w-full" name="tipoatendimento_id"
                                :options="$tipoAtendimento" :value="old('tipoatendimento_id')" required autofocus autocomplete="atendimento" />
                            <x-input-error :messages="$errors->get('tipoatendimento_id')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dia" :value="__('Atendimento')" />
                            <x-select-input id="dia" class="block w-full" name="dia" :options="$dias"
                                :value="old('dia')" required />
                            <x-input-error :messages="$errors->get('dia')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="inicio1" :value="__('Inicio 1')" />
                            <x-text-input id="inicio1" class="block w-full" type="time" name="inicio1"
                                :value="old('inicio1')"/>
                            <x-input-error :messages="$errors->get('inicio1')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="final1" :value="__('Final 1')" />
                            <x-text-input id="final1" class="block w-full" type="time" name="final1"
                                :value="old('final1')" />
                            <x-input-error :messages="$errors->get('final1')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="inicio2" :value="__('Inicio 2')" />
                            <x-text-input id="inicio2" class="block w-full" type="time" name="inicio2"
                                :value="old('inicio2')" />
                            <x-input-error :messages="$errors->get('inicio2')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="final2" :value="__('Final 2')" />
                            <x-text-input id="final2" class="block w-full" type="time" name="final2"
                                :value="old('final2')" />
                            <x-input-error :messages="$errors->get('final2')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block w-full" type="text" name="descricao"
                                :value="old('descricao')" />
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" texto="" />
                        </div>

                        <div class="flex justify-center items-end">
                            <x-primary-button class="mb-4">
                                {{ __('Salvar') }}
                            </x-primary-button>
                        </div>
                    </form>
                @else
                    <form class="md:flex w-full" method="POST"
                        action="{{ route('horario.update', $horario->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="m-4">
                            <x-input-label for="tipoatendimento_id" :value="__('Atendimento')" />
                            <x-select-input id="tipoatendimento_id" class="block w-full" name="tipoatendimento_id"
                                :options="$tipoAtendimento" :value="old('tipoatendimento_id')" required autofocus autocomplete="atendimento" />
                            <x-input-error :messages="$errors->get('tipoatendimento_id')" class="mt-2" texto="" />
                        </div>
                        <div class="m-4">
                            <x-input-label for="dia" :value="__('Atendimento')" />
                            <x-select-input id="dia" class="block w-full" name="dia" :options="$dias"
                                :value="$horario->dia" required />
                            <x-input-error :messages="$errors->get('dia')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="inicio1" :value="__('Inicio 1')" />
                            <x-text-input id="inicio1" class="block w-full" type="time" name="inicio1"
                                :value="$horario->inicio1" />
                            <x-input-error :messages="$errors->get('inicio1')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="final1" :value="__('Final 1')" />
                            <x-text-input id="final1" class="block w-full" type="time" name="final1"
                                :value="$horario->final1" />
                            <x-input-error :messages="$errors->get('final1')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="inicio2" :value="__('Inicio 2')" />
                            <x-text-input id="inicio2" class="block w-full" type="time" name="inicio2"
                                :value="$horario->inicio2" />
                            <x-input-error :messages="$errors->get('inicio2')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="final2" :value="__('Final 2')" />
                            <x-text-input id="final2" class="block w-full" type="time" name="final2"
                                :value="$horario->final2" />
                            <x-input-error :messages="$errors->get('final2')" class="mt-2" texto="" />
                        </div>

                        <div class="m-4">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <x-text-input id="descricao" class="block w-full" type="text" name="descricao"
                                :value="$horario->descricao" />
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" texto="" />
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
                                @if(count($horarios)>0)
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr class="bg-blue-800">
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Atendimento
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Dia
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Inicio 1</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Final 1</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Inicio 2</th>
                                                <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Final 2</th>
                                                <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                Descrição</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-end text-xs font-medium text-white uppercase">Ação
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($horarios as $tipo)
                                            <tr
                                                class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{$tipo->tipoatendimento->nome}}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ $tipo->dia }}</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    @isset($tipo->inicio1){{ date('H:i', strtotime($tipo->inicio1)) }}@endisset</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    @isset($tipo->final1){{ date('H:i', strtotime($tipo->final1)) }}@endisset</td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    @isset($tipo->inicio2){{ date('H:i', strtotime($tipo->inicio2)) }}@endisset</td>
                                                    <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    @isset($tipo->final2){{ date('H:i', strtotime($tipo->final2)) }}@endisset</td>
                                                    <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{ $tipo->descricao }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                    <a href="{{ route('horario.edit', $tipo->id) }}"
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
                                                        $route = 'horario.destroy';
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
                                        Nenhum dado encontrado em Horário.
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

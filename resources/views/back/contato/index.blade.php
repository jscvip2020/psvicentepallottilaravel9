<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contato') }}
            </h2>

            @if (count($contatos) > 0)
            @else
                <a href="{{ route('contato.create') }}">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:bg-green-400 focus:ring-offset-2 transition ease-in-out duration-150">Novo
                        contato</button>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-message></x-message>
            </div>
            <div class="bg-white overflow-hidden mt-4 shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                @if (count($contatos) > 0)
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr class="bg-blue-800">
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    CEP
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Endereço
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Telefone</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Celular</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Email</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Localização</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Ação
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contatos as $tipo)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->cep}}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{$tipo->logradouro}}, {{$tipo->numero}} <br> {{$tipo->bairro}} - {{$tipo->localidade}}-{{$tipo->uf}}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{$tipo->telefone}}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 flex items-center whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{$tipo->celular}}  @if($tipo->whatsapp) <span class="fab fa-whatsapp-square ml-2 text-green-950 text-4xl"></span> @endif
                                                    </td>
                                                    <td
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{$tipo->email}}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        @if(isset($tipo->localizacao))
                                                        <span class="fas fa-location-dot text-lg" title="{{$tipo->localizacao}}"></span>
                                                        @endif
                                                    </td>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('contato.edit', $tipo->id) }}"
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
                                                            $route = 'contato.destroy';
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
                                        Nenhum dado encontrado em Contato.
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

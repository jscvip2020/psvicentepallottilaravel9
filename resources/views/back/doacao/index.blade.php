<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doações') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <x-message></x-message>
                @if (request()->routeIs('doacao.index'))
                    <form class="w-full" enctype="multipart/form-data" method="POST" action="{{ route('doacao.store') }}">
                        @csrf
                        <div class="w-full md:flex">
                            <div class="m-4">
                                <x-input-label for="imgtopo" :value="__('Imagem do topo')" />
                                <x-text-input id="imgtopo" class="block w-full" type="file" name="imgtopo"
                                    accept="image/jpeg, image/png" />
                                <x-input-error :messages="$errors->get('imgtopo')" class="mt-2"
                                    texto="Escolha uma imagem para o topo com ratio de 4/1." />
                            </div>
                            <div class="m-4">
                                <x-input-label for="qrcode" :value="__('QrCode')" />
                                <x-text-input id="qrcode" class="block w-full" type="file" name="qrcode"
                                    accept="image/jpeg, image/png" />
                                <x-input-error :messages="$errors->get('qrcode')" class="mt-2"
                                    texto="Escolha uma qrcode com ratio de 1/1." />
                            </div>
                        </div>
                        <div class="w-full md:flex">
                            <div class="m-4">
                                <x-input-label for="banco" :value="__('Banco')" />
                                <x-text-input id="banco" class="block w-full" type="text" name="banco"
                                    :value="old('banco')" />
                                <x-input-error :messages="$errors->get('banco')" class="mt-2" texto="Nome do Banco" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="agencia" :value="__('Agencia')" />
                                <x-text-input id="agencia" class="block w-full" type="text" name="agencia"
                                    :value="old('agencia')"  maxlength="6" onkeypress="return FormataDado(this,5,1,event);"  />
                                <x-input-error :messages="$errors->get('agencia')" class="mt-2" texto="Ex: 0XXX-x" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="conta" :value="__('Conta')" />
                                <x-text-input id="conta" class="block w-full" type="text" name="conta"
                                    :value="old('conta')" maxlength="7" onkeypress="return FormataDado(this,6,1,event);" />
                                <x-input-error :messages="$errors->get('conta')" class="mt-2" texto="Ex: #####-#" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="cnpj" :value="__('Cnpj')" />
                                <x-text-input id="cnpj" class="block w-full" type="text" name="cnpj"
                                    :value="old('cnpj')" />
                                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" texto="" />
                            </div>

                            <div class="flex justify-center items-end">
                                <x-primary-button class="mb-4">
                                    {{ __('Salvar') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="w-full" enctype="multipart/form-data" method="POST"
                        action="{{ route('doacao.update', $doacao->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="w-full md:flex">
                            <div class="m-4">
                                <x-input-label for="imgtopo" :value="__('Imagem do topo')" />
                                <x-text-input id="imgtopo" class="block w-full" type="file" name="imgtopo"
                                    accept="image/jpeg, image/png" />
                                <x-input-error :messages="$errors->get('imgtopo')" class="mt-2"
                                    texto="Escolha uma imagem para o topo com ratio de 4/1." />
                            </div>
                            <div class="m-4">
                                <x-input-label for="qrcode" :value="__('QrCode')" />
                                <x-text-input id="qrcode" class="block w-full" type="file" name="qrcode"
                                    accept="image/jpeg, image/png" />
                                <x-input-error :messages="$errors->get('qrcode')" class="mt-2"
                                    texto="Escolha uma qrcode com ratio de 1/1." />
                            </div>
                        </div>
                        <div class="w-full md:flex">
                            <div class="m-4">
                                <x-input-label for="banco" :value="__('Banco')" />
                                <x-text-input id="banco" class="block w-full" type="text" name="banco"
                                    value="{{ $doacao->banco }}" />
                                <x-input-error :messages="$errors->get('banco')" class="mt-2" texto="Nome do Banco" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="agencia" :value="__('Agencia')" />
                                <x-text-input id="agencia" class="block w-full" type="text" name="agencia"
                                    value="{{$doacao->agencia}}"  maxlength="6" onkeypress="return FormataDado(this,5,1,event);"  />
                                <x-input-error :messages="$errors->get('agencia')" class="mt-2" texto="Ex: 0XXX-x" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="conta" :value="__('Conta')" />
                                <x-text-input id="conta" class="block w-full" type="text" name="conta"
                                    value="{{$doacao->conta}}"  maxlength="7" onkeypress="return FormataDado(this,6,1,event);"  />
                                <x-input-error :messages="$errors->get('conta')" class="mt-2" texto="Ex: #####-#" />
                            </div>
                            <div class="m-4">
                                <x-input-label for="cnpj" :value="__('Cnpj')" />
                                <x-text-input id="cnpj" class="block w-full" type="text" name="cnpj"
                                    value="{{$doacao->cnpj}}" />
                                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" texto="" />
                            </div>

                            <div class="flex justify-center items-end">
                                <x-primary-button class="mb-4">
                                    {{ __('Alterar') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
            <div class="bg-white overflow-hidden mt-4 shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                @if (count($doacaos) > 0)
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr class="bg-blue-800">
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Imagem topo
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    QrCode
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Banco</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Agência</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    Conta</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-white uppercase">
                                                    CNPJ</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-end text-xs font-medium text-white uppercase">
                                                    Ação
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doacaos as $tipo)
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        <img src="{{ asset('images/dizimo/'.$tipo->imgtopo) }}" alt="imagem topo">
                                                    </td>
                                                    <td
                                                        class="px-6 max-h-28 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        <img src="{{ asset('images/dizimo/'.$tipo->qrcode) }}" alt="QrCode">
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->banco }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->agencia }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->conta }}</td>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $tipo->cnpj }}</td>
                                                    </td>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('doacao.edit', $tipo->id) }}"
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
                                                            $route = 'doacao.destroy';
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
                                        Nenhum dado encontrado em Doações.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
        <script>
            $(document).ready(function($) {
                $('#cnpj').inputmask('99.999.999/9999-99');
            });


            function FormataDado(campo, tammax, pos, teclapres) {
                var keyCode;
                if (teclapres.srcElement)
                {
                  keyCode = teclapres.keyCode;
                } else  if (teclapres.target)
                {
                keyCode = teclapres.which;
                }
                if (keyCode == 0 || keyCode == 8) { return true; }
                if ((keyCode < 48 || keyCode > 57) && keyCode != 88 && (keyCode != 120)) { return false; }
                var tecla = keyCode;
                vr = campo.value;
                vr = vr.replace("-", "");
                vr = vr.replace("/", "");

                tam = vr.length;
                if (tam < tammax && tecla != 8)
                { tam = vr.length + 1; }
                if (tecla == 8)
              {
                  tam = tam - 1;
              }
                if (tecla == 8 || tecla == 88 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 || tecla == 120)
              {
                if (tam <= 2)
              {
                    campo.value = vr;
              }
                if (tam > pos && tam <= tammax)
              {
              campo.value = vr.substr(0, tam - pos) + "-" + vr.substr(tam - pos, tam);
              }
              }
              }

        </script>

    </x-slot>
</x-app-layout>

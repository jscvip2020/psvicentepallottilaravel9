<x-front-layout>
    <x-slot:title>Pastoral do Dízimo</x-slot>
    <x-slot:description>Página para doações</x-slot>

    <x-slot:imagemface>
        @if (isset($doacao->imgtopo))
            {{ asset('images/dizimo/topodoacao.png') }}
        @else
            {{ asset('images/dizimo/topodoacaodefault.png') }}
        @endif
    </x-slot>
    <div class="w-full">
        @if (isset($doacao->imgtopo))
            <img class="w-full md:h-[320px] " src="{{ asset('images/dizimo/topodoacao.png') }}" alt="Imagem Topo">
        @else
            <img class="w-full md:h-[320px] " src="{{ asset('images/dizimo/topodoacaodefault.png') }}" alt="Imagem Topo">
        @endif
    </div>
    <div class="md:flex">
        <div class="m-4 md:w-1/2 text-center">
            <p class="text-3xl font-serif font-semibold">
                Nossa paróquia precisa de <b>você</b>!</p>
            <p class="pt-3 font-black uppercase text-5xl">
                Seja dizimista!</p>
            <p class="pt-3 text-xl">
                Procure a <b>Pastoral do Dízimo</b> na secretaria paroquial e faça seu cadastro!</p>
            <p class="mt-8 text-xl">
                Ou faça sua contribuição diretamente na conta da paróquia</p>
            @if (isset($doacao->banco))
                <ul class=" mt-7 text-violet-950 font-black md:text-5xl text-3xl">
                    <li class="flex mb-4"><span class="block text-right w-1/3">Banco: </span><span
                            class="text-left pl-2">Banco
                            do Brasil</span></li>
                    <li class="flex mb-4"><span class="block text-right w-1/3">Agência: </span><span
                            class="text-left pl-2">0645-9</span></li>
                    <li class="flex mb-4"><span class="block text-right w-1/3">Conta: </span><span
                            class="text-left pl-2">xxxxx-x</span></li>
                </ul>
            @endif

            <p class="text-3xl pt-3">Mitra - {{ env('APP_NAME') }}</p>
            @if (isset($doacao->cnpj))
                <p class="text-3xl pt-3"><b>CNPJ: </b> 75.858.506/0032-31</p>
            @endif
        </div>
        <div class="m-4 md:w-1/2" style="display: flex;flex-direction: column;align-items: center;">
            @if (isset($doacao->qrcode))
                <img class="block md:w-2/3 mb-4" src="{{ asset('images/logo-pix.png') }}" alt="logo Pix">
                <img class="block md:w-2/3" src="{{ asset('images/dizimo/qrCodeDoacao.png') }}" alt="QrCode">
            @endif
        </div>

    </div>

    <div class="bg-black text-white text-center">
        @if(isset($contato))
            <span class="block">{{ $contato->logradouro }}, {{ $contato->numero }}
                {{ $contato->bairro }} | {{ $contato->cep }} - {{ $contato->localidade }}-{{ $contato->uf }}.</span>
        @endif
    </div>
</x-front-layout>

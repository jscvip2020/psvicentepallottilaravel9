<div class="container mx-auto mt-5">
    <div class="flex justify-center flex-wrap">
        @foreach ($atendimentos as $atendimento)
            <a href="{{route($atendimento->link)}}" class="text-red-800 hover:text-gray-900">
                <div
                    class="w-[200px] m-3 h-[200px] border-4 items-center flex flex-col justify-center border-orange-600 hover:border-gray-600 rounded-full">
                    <div class="{{ $atendimento->icone }} text-7xl"></div>
                    <div>{{ $atendimento->nome }}</div>
                </div>
            </a>
        @endforeach
        @if(count($grupos)>0)
        <a href="{{ route('grupos') }}" class="text-red-800 hover:text-gray-900">
            <div
                class="w-[200px] m-3 h-[200px] border-4 items-center flex flex-col justify-center border-orange-600 hover:border-gray-600 rounded-full">
                <div class="icon-players text-7xl"></div>
                <div>Grupos de Orações</div>
            </div>
        </a>
    
        @endif
    </div>

</div>

<div class="bg-black w-full text-white mt-4">
    <div class="md:h-10 md:flex md:justify-between md:items-center p-4">
      <div class="md:flex items-center">
        <div class="flex justify-cente items-center">
         <x-application-logo class="block h-8 w-auto fill-current text-white" />
         <span class="ml-4 block">{{env('APP_NAME') }}</span>
        </div>
         <span class="ml-2 flex justify-center">&copy; 2024 - {{ date("Y") }}</span>
      </div>
       <div class=" flex  justify-center">Criado por: <a href="jscvip.mat.br" target="_blank">Jose Sergio Cordeiro</a></div>
        <div class="flex justify-center" >
            @forelse($redes as $rede)
                <a href="{{ $rede->url }}" title="{{ $rede->nome }}"><i class="{{ $rede->icone }} text-lg pr-2"></i></a>
            @empty
            @endforelse
        </div>
    </div>
</div>

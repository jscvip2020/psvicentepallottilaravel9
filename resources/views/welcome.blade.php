<x-front-layout>
    <x-slot:title>Bem Vindo(a)</x-slot>
    <x-slot:description>Página inicial da {{ config('app.name') }}</x-slot>
    <x-slot:imagemface>
        {{ asset('images/logo.png') }}
    </x-slot>
    <x-slide :images="$images"></x-slide>
    <x-horarios :atendimentos="$atendimentos" :grupos="$grupos"></x-horarios>
    @if($popup)
    <x-popup :imagem="$popup->imagem"/>
    @endif

    <x-slot:script>
        <script>
            var close = document.getElementById('close');
            var popup = document.getElementById('popup');

            close.addEventListener("click", function() {
                popup.style.display = 'none';
            });
        </script>
    </x-slot:script>

</x-front-layout>

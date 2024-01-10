<x-front-layout>
    <x-slot:title>Bem Vindo(a)</x-slot>
    <x-slot:description>Página inicial da {{env('APP_NAME')}}</x-slot>
    <x-slot:imagemface>
        {{ asset('images/logo.png')}}
    </x-slot>

    <x-slide :images="$images"></x-slide>
    <x-horarios :atendimentos="$atendimentos" :grupos="$grupos"></x-horarios>


</x-front-layout>

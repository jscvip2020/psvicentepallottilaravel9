@props(['messages','texto'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@else
    <p class="text-gray-500 text-xs italic mt-2">{{(isset($texto))?$texto:""}}</p>
@endif

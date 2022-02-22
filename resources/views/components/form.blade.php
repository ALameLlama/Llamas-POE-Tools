@props([
    'mt' => 8,
])

<form {{ $attributes->merge(['class' => "mt-$mt space-y-6"]) }}>
    @csrf
    {{$slot}}
</form>

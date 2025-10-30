@props([
    'name' => null,
    'value' => null,
    'id' => null
])

@php
    $inputId = $id ?? $name ?? uniqid('hidden_');
@endphp

<input 
    type="hidden"
    id="{{ $inputId }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->except(['name', 'value', 'id']) }}
/>
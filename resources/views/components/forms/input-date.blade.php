@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'min' => null,
    'max' => null,
    'autocomplete' => null,
    'autofocus' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null
])

@php
    $inputId = $id ?? $name ?? uniqid('date_');
    $inputClass = 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500 focus:border-red-500 focus:ring-red-500';
    }
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }}" />
    @endif
    
    <input 
        type="date"
        id="{{ $inputId }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($min) min="{{ $min }}" @endif
        @if($max) max="{{ $max }}" @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if($autofocus) autofocus @endif
        class="{{ $inputClass }}"
        {{ $attributes->except(['label', 'name', 'value', 'required', 'disabled', 'readonly', 'min', 'max', 'autocomplete', 'autofocus', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText']) }}
    />
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
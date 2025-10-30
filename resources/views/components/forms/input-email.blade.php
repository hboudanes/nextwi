@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'autocomplete' => 'email',
    'autofocus' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null
])

@php
    $inputId = $id ?? $name ?? uniqid('email_');
    $inputClass = 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500';
    }
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 mb-2 {{ $labelClass }}">
            {{ $label }}@if($required) <span class="text-red-500">*</span>@endif
        </label>
    @endif
    
    <input 
        type="email"
        id="{{ $inputId }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if($autofocus) autofocus @endif
        class="{{ $inputClass }}"
        {{ $attributes->except(['label', 'name', 'value', 'placeholder', 'required', 'disabled', 'readonly', 'autocomplete', 'autofocus', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText']) }}
    />
    
    @if($helpText)
        <p class="text-xs text-gray-500 mt-1">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name && $errors->has($name))
        <p class="mt-1 text-sm text-red-600">{{ $errors->first($name) }}</p>
    @endif
</div>
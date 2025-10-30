@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'required' => false,
    'disabled' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'labelPosition' => 'right' // 'left' or 'right'
])

@php
    $inputId = $id ?? $name ?? uniqid('checkbox_');
    $inputClass = 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500 focus:ring-red-500';
    }
    
    $isChecked = old($name) ? (old($name) == $value) : $checked;
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    <div class="flex items-center {{ $labelPosition === 'left' ? 'flex-row-reverse justify-end' : '' }}">
        <input 
            type="checkbox"
            id="{{ $inputId }}"
            name="{{ $name }}"
            value="{{ $value }}"
            @if($isChecked) checked @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            class="{{ $inputClass }}"
            {{ $attributes->except(['label', 'name', 'value', 'checked', 'required', 'disabled', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'labelPosition']) }}
        />
        
        @if($label)
            <label 
                for="{{ $inputId }}" 
                class="text-sm text-gray-700 {{ $labelPosition === 'left' ? 'mr-2' : 'ml-2' }} {{ $labelClass }}"
            >
                {{ $label }}
            </label>
        @endif
    </div>
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
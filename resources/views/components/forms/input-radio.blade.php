@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'value' => null,
    'required' => false,
    'disabled' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'inline' => false
])

@php
    $baseId = $id ?? $name ?? uniqid('radio_');
    $inputClass = 'border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500 focus:ring-red-500';
    }
    
    $selectedValue = old($name, $value);
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <x-input-label :value="$label" class="{{ $labelClass }} mb-2" />
    @endif
    
    <div class="{{ $inline ? 'flex flex-wrap gap-4' : 'space-y-2' }}">
        @foreach($options as $optionValue => $optionLabel)
            @php
                $optionId = $baseId . '_' . $loop->index;
            @endphp
            
            <div class="flex items-center">
                <input 
                    type="radio"
                    id="{{ $optionId }}"
                    name="{{ $name }}"
                    value="{{ $optionValue }}"
                    @if($selectedValue == $optionValue) checked @endif
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="{{ $inputClass }}"
                    {{ $attributes->except(['label', 'name', 'options', 'value', 'required', 'disabled', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'inline']) }}
                />
                
                <label 
                    for="{{ $optionId }}" 
                    class="ml-2 text-sm text-gray-700"
                >
                    {{ $optionLabel }}
                </label>
            </div>
        @endforeach
    </div>
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>
@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'required' => false,
    'disabled' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'showValue' => true,
    'valueDisplay' => null,
    'unit' => null,
    'syncWith' => null
])

@php
    $inputId = $id ?? $name ?? uniqid('range_');
    $valueDisplayId = $inputId . '_display';
    $inputClass = 'w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    $currentValue = old($name, $value) ?? $min;
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <div class="flex justify-between items-center mb-2">
            <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }}" />
            @if($showValue)
                <span id="{{ $valueDisplayId }}" class="text-sm text-gray-600 font-medium">
                    {{ $valueDisplay ?? $currentValue }}{{ $unit }}
                </span>
            @endif
        </div>
    @endif
    
    <input 
        type="range"
        id="{{ $inputId }}"
        name="{{ $name }}"
        value="{{ $currentValue }}"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        class="{{ $inputClass }}"
        @if($showValue || $syncWith) 
            oninput="updateRangeValue('{{ $inputId }}', '{{ $valueDisplayId }}', '{{ $syncWith }}', '{{ $unit }}')"
        @endif
        {{ $attributes->except(['label', 'name', 'value', 'min', 'max', 'step', 'required', 'disabled', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'showValue', 'valueDisplay', 'unit', 'syncWith']) }}
    />
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

@push('scripts')
<script>
    function updateRangeValue(rangeId, displayId, syncId, unit) {
        const range = document.getElementById(rangeId);
        const display = document.getElementById(displayId);
        const sync = syncId ? document.getElementById(syncId) : null;
        
        if (display) {
            display.textContent = range.value + (unit || '');
        }
        
        if (sync) {
            sync.value = range.value;
        }
    }
</script>
@endpush

@push('styles')
<style>
    .slider::-webkit-slider-thumb {
        appearance: none;
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: #3B82F6;
        cursor: pointer;
        box-shadow: 0 0 2px 0 #555;
        transition: background .15s ease-in-out;
    }
    
    .slider::-webkit-slider-thumb:hover {
        background: #2563EB;
    }
    
    .slider::-moz-range-thumb {
        height: 20px;
        width: 20px;
        border-radius: 50%;
        background: #3B82F6;
        cursor: pointer;
        border: none;
        box-shadow: 0 0 2px 0 #555;
        transition: background .15s ease-in-out;
    }
    
    .slider::-moz-range-thumb:hover {
        background: #2563EB;
    }
</style>
@endpush
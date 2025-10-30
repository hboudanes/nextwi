@props([
    'label' => null,
    'name' => null,
    'value' => '#000000',
    'required' => false,
    'disabled' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'showHex' => true,
    'showPreview' => true
])

@php
    $inputId = $id ?? $name ?? uniqid('color_');
    $hexId = $inputId . '_hex';
    $previewId = $inputId . '_preview';
    $currentValue = old($name, $value) ?? '#000000';
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }} mb-2" />
    @endif
    
    <div class="flex items-center space-x-3">
        <div class="relative">
            <input 
                type="color"
                id="{{ $inputId }}"
                name="{{ $name }}"
                value="{{ $currentValue }}"
                @if($required) required @endif
                @if($disabled) disabled @endif
                class="h-10 w-16 rounded border border-gray-300 cursor-pointer {{ $class }}"
                onchange="updateColorValue('{{ $inputId }}', '{{ $hexId }}', '{{ $previewId }}')"
                {{ $attributes->except(['label', 'name', 'value', 'required', 'disabled', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'showHex', 'showPreview']) }}
            />
        </div>
        
        @if($showHex)
            <div class="flex-1">
                <input 
                    type="text"
                    id="{{ $hexId }}"
                    value="{{ $currentValue }}"
                    placeholder="#000000"
                    pattern="^#[0-9A-Fa-f]{6}$"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    onchange="updateColorFromHex('{{ $inputId }}', '{{ $hexId }}', '{{ $previewId }}')"
                    @if($disabled) disabled @endif
                />
            </div>
        @endif
        
        @if($showPreview)
            <div 
                id="{{ $previewId }}"
                class="w-10 h-10 rounded border border-gray-300 shadow-sm"
                style="background-color: {{ $currentValue }}"
            ></div>
        @endif
    </div>
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

@push('scripts')
<script>
    function updateColorValue(colorId, hexId, previewId) {
        const colorInput = document.getElementById(colorId);
        const hexInput = document.getElementById(hexId);
        const preview = document.getElementById(previewId);
        
        if (hexInput) {
            hexInput.value = colorInput.value;
        }
        
        if (preview) {
            preview.style.backgroundColor = colorInput.value;
        }
    }
    
    function updateColorFromHex(colorId, hexId, previewId) {
        const colorInput = document.getElementById(colorId);
        const hexInput = document.getElementById(hexId);
        const preview = document.getElementById(previewId);
        
        // Validate hex format
        const hexPattern = /^#[0-9A-Fa-f]{6}$/;
        if (hexPattern.test(hexInput.value)) {
            colorInput.value = hexInput.value;
            
            if (preview) {
                preview.style.backgroundColor = hexInput.value;
            }
        } else {
            // Reset to current color value if invalid
            hexInput.value = colorInput.value;
        }
    }
</script>
@endpush
@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'rows' => 4,
    'cols' => null,
    'maxlength' => null,
    'minlength' => null,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'showCharCount' => false,
    'autoResize' => false
])

@php
    $inputId = $id ?? $name ?? uniqid('textarea_');
    $countId = $inputId . '_count';
    $inputClass = 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full';
    if ($autoResize) {
        $inputClass .= ' resize-none';
    }
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500 focus:border-red-500 focus:ring-red-500';
    }
    
    $currentValue = old($name, $value) ?? '';
    $currentLength = strlen($currentValue);
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <div class="flex justify-between items-center mb-2">
            <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }}" />
            @if($showCharCount && $maxlength)
                <span id="{{ $countId }}" class="text-sm text-gray-500">
                    {{ $currentLength }}/{{ $maxlength }}
                </span>
            @endif
        </div>
    @endif
    
    <textarea 
        id="{{ $inputId }}"
        name="{{ $name }}"
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($rows) rows="{{ $rows }}" @endif
        @if($cols) cols="{{ $cols }}" @endif
        @if($maxlength) maxlength="{{ $maxlength }}" @endif
        @if($minlength) minlength="{{ $minlength }}" @endif
        class="{{ $inputClass }}"
        @if($showCharCount || $autoResize)
            oninput="handleTextareaInput('{{ $inputId }}', '{{ $countId }}', {{ $maxlength ?? 'null' }}, {{ $autoResize ? 'true' : 'false' }})"
        @endif
        {{ $attributes->except(['label', 'name', 'value', 'placeholder', 'required', 'disabled', 'readonly', 'rows', 'cols', 'maxlength', 'minlength', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'showCharCount', 'autoResize']) }}
    >{{ $currentValue }}</textarea>
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

@if($showCharCount || $autoResize)
    @push('scripts')
    <script>
        function handleTextareaInput(textareaId, countId, maxLength, autoResize) {
            const textarea = document.getElementById(textareaId);
            const counter = document.getElementById(countId);
            
            // Update character count
            if (counter && maxLength) {
                const currentLength = textarea.value.length;
                counter.textContent = currentLength + '/' + maxLength;
                
                // Change color when approaching limit
                if (currentLength > maxLength * 0.9) {
                    counter.classList.add('text-red-500');
                    counter.classList.remove('text-gray-500');
                } else {
                    counter.classList.add('text-gray-500');
                    counter.classList.remove('text-red-500');
                }
            }
            
            // Auto resize
            if (autoResize) {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            }
        }
        
        // Initialize auto-resize on page load
        document.addEventListener('DOMContentLoaded', function() {
            const autoResizeTextareas = document.querySelectorAll('textarea[oninput*="autoResize"]');
            autoResizeTextareas.forEach(textarea => {
                if (textarea.value) {
                    textarea.style.height = 'auto';
                    textarea.style.height = textarea.scrollHeight + 'px';
                }
            });
        });
    </script>
    @endpush
@endif
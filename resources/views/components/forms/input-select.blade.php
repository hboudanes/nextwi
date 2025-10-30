@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'multiple' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'searchable' => false,
    'emptyOption' => true,
    'emptyText' => 'Select an option'
])

@php
    $inputId = $id ?? $name ?? uniqid('select_');
    $inputClass = 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full';
    if ($class) {
        $inputClass .= ' ' . $class;
    }
    if ($errors->has($name)) {
        $inputClass .= ' border-red-500 focus:border-red-500 focus:ring-red-500';
    }
    
    $selectedValue = old($name, $value);
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }}" />
    @endif
    
    @if($searchable)
        <div class="relative">
            <select 
                id="{{ $inputId }}"
                name="{{ $name }}{{ $multiple ? '[]' : '' }}"
                @if($required) required @endif
                @if($disabled) disabled @endif
                @if($multiple) multiple @endif
                class="{{ $inputClass }}"
                onchange="handleSelectChange('{{ $inputId }}')"
                {{ $attributes->except(['label', 'name', 'options', 'value', 'placeholder', 'required', 'disabled', 'multiple', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'searchable', 'emptyOption', 'emptyText']) }}
            >
                @if($emptyOption && !$multiple)
                    <option value="">{{ $placeholder ?? $emptyText }}</option>
                @endif
                
                @foreach($options as $optionValue => $optionLabel)
                    @if(is_array($optionLabel))
                        <optgroup label="{{ $optionValue }}">
                            @foreach($optionLabel as $subValue => $subLabel)
                                <option 
                                    value="{{ $subValue }}"
                                    @if($multiple && is_array($selectedValue) && in_array($subValue, $selectedValue)) selected
                                    @elseif(!$multiple && $selectedValue == $subValue) selected
                                    @endif
                                >
                                    {{ $subLabel }}
                                </option>
                            @endforeach
                        </optgroup>
                    @else
                        <option 
                            value="{{ $optionValue }}"
                            @if($multiple && is_array($selectedValue) && in_array($optionValue, $selectedValue)) selected
                            @elseif(!$multiple && $selectedValue == $optionValue) selected
                            @endif
                        >
                            {{ $optionLabel }}
                        </option>
                    @endif
                @endforeach
            </select>
            
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    @else
        <select 
            id="{{ $inputId }}"
            name="{{ $name }}{{ $multiple ? '[]' : '' }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($multiple) multiple @endif
            class="{{ $inputClass }}"
            {{ $attributes->except(['label', 'name', 'options', 'value', 'placeholder', 'required', 'disabled', 'multiple', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'searchable', 'emptyOption', 'emptyText']) }}
        >
            @if($emptyOption && !$multiple)
                <option value="">{{ $placeholder ?? $emptyText }}</option>
            @endif
            
            @foreach($options as $optionValue => $optionLabel)
                @if(is_array($optionLabel))
                    <optgroup label="{{ $optionValue }}">
                        @foreach($optionLabel as $subValue => $subLabel)
                            <option 
                                value="{{ $subValue }}"
                                @if($multiple && is_array($selectedValue) && in_array($subValue, $selectedValue)) selected
                                @elseif(!$multiple && $selectedValue == $subValue) selected
                                @endif
                            >
                                {{ $subLabel }}
                            </option>
                        @endforeach
                    </optgroup>
                @else
                    <option 
                        value="{{ $optionValue }}"
                        @if($multiple && is_array($selectedValue) && in_array($optionValue, $selectedValue)) selected
                        @elseif(!$multiple && $selectedValue == $optionValue) selected
                        @endif
                    >
                        {{ $optionLabel }}
                    </option>
                @endif
            @endforeach
        </select>
    @endif
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

@if($searchable)
    @push('scripts')
    <script>
        function handleSelectChange(selectId) {
            const select = document.getElementById(selectId);
            // Add any custom logic for searchable select here
            console.log('Select changed:', select.value);
        }
    </script>
    @endpush
@endif
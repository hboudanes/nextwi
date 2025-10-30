@props([
    'label' => null,
    'name' => null,
    'required' => false,
    'disabled' => false,
    'accept' => null,
    'multiple' => false,
    'id' => null,
    'class' => null,
    'labelClass' => null,
    'containerClass' => null,
    'showErrors' => true,
    'helpText' => null,
    'maxSize' => null,
    'showPreview' => false,
    'dragDrop' => true
])

@php
    $inputId = $id ?? $name ?? uniqid('file_');
    $previewId = $inputId . '_preview';
    $dropzoneId = $inputId . '_dropzone';
@endphp

<div class="{{ $containerClass ?? 'mb-4' }}">
    @if($label)
        <x-input-label for="{{ $inputId }}" :value="$label" class="{{ $labelClass }} mb-2" />
    @endif
    
    @if($dragDrop)
        <div 
            id="{{ $dropzoneId }}"
            class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors duration-200 {{ $class }}"
            ondrop="handleFileDrop(event, '{{ $inputId }}')"
            ondragover="handleDragOver(event)"
            ondragenter="handleDragEnter(event, '{{ $dropzoneId }}')"
            ondragleave="handleDragLeave(event, '{{ $dropzoneId }}')"
        >
            <input 
                type="file"
                id="{{ $inputId }}"
                name="{{ $name }}"
                @if($required) required @endif
                @if($disabled) disabled @endif
                @if($accept) accept="{{ $accept }}" @endif
                @if($multiple) multiple @endif
                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                onchange="handleFileSelect(event, '{{ $previewId }}')"
                {{ $attributes->except(['label', 'name', 'required', 'disabled', 'accept', 'multiple', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'maxSize', 'showPreview', 'dragDrop']) }}
            />
            
            <div class="space-y-2">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="text-gray-600">
                    <span class="font-medium text-blue-600 hover:text-blue-500">Click to upload</span>
                    or drag and drop
                </div>
                @if($accept || $maxSize)
                    <p class="text-xs text-gray-500">
                        @if($accept) {{ $accept }} @endif
                        @if($maxSize) (Max: {{ $maxSize }}) @endif
                    </p>
                @endif
            </div>
        </div>
    @else
        <input 
            type="file"
            id="{{ $inputId }}"
            name="{{ $name }}"
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($accept) accept="{{ $accept }}" @endif
            @if($multiple) multiple @endif
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 {{ $class }}"
            onchange="handleFileSelect(event, '{{ $previewId }}')"
            {{ $attributes->except(['label', 'name', 'required', 'disabled', 'accept', 'multiple', 'id', 'class', 'labelClass', 'containerClass', 'showErrors', 'helpText', 'maxSize', 'showPreview', 'dragDrop']) }}
        />
    @endif
    
    @if($showPreview)
        <div id="{{ $previewId }}" class="mt-4 hidden">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="{{ $previewId }}_container"></div>
        </div>
    @endif
    
    @if($helpText)
        <p class="mt-1 text-sm text-gray-600">{{ $helpText }}</p>
    @endif
    
    @if($showErrors && $name)
        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    @endif
</div>

@push('scripts')
<script>
    function handleDragOver(e) {
        e.preventDefault();
    }
    
    function handleDragEnter(e, dropzoneId) {
        e.preventDefault();
        document.getElementById(dropzoneId).classList.add('border-blue-400', 'bg-blue-50');
    }
    
    function handleDragLeave(e, dropzoneId) {
        e.preventDefault();
        if (!e.currentTarget.contains(e.relatedTarget)) {
            document.getElementById(dropzoneId).classList.remove('border-blue-400', 'bg-blue-50');
        }
    }
    
    function handleFileDrop(e, inputId) {
        e.preventDefault();
        const input = document.getElementById(inputId);
        const dropzone = e.currentTarget;
        
        dropzone.classList.remove('border-blue-400', 'bg-blue-50');
        
        if (e.dataTransfer.files.length > 0) {
            input.files = e.dataTransfer.files;
            handleFileSelect({ target: input }, inputId + '_preview');
        }
    }
    
    function handleFileSelect(e, previewId) {
        const files = e.target.files;
        const preview = document.getElementById(previewId);
        const container = document.getElementById(previewId + '_container');
        
        if (!preview || !container) return;
        
        container.innerHTML = '';
        
        if (files.length > 0) {
            preview.classList.remove('hidden');
            
            Array.from(files).forEach(file => {
                const div = document.createElement('div');
                div.className = 'relative';
                
                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.className = 'w-full h-24 object-cover rounded-lg';
                    img.src = URL.createObjectURL(file);
                    div.appendChild(img);
                } else {
                    div.innerHTML = `
                        <div class="w-full h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-xs text-gray-500 mt-1">${file.name}</p>
                            </div>
                        </div>
                    `;
                }
                
                container.appendChild(div);
            });
        } else {
            preview.classList.add('hidden');
        }
    }
</script>
@endpush
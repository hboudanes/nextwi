@props([
    'name' => '',
    'address' => '',
    'phone' => '',
    'googleMapsLink' => '#',
    'status' => 'active',
    'operators' => [],
    'management' => [],
    'vouchers' => 0,
    'viewRoute' => '#',
    'editRoute' => '#',
    'deleteRoute' => '#',
])

@php
    $statusColors = [
        'active' => [
            'bg' => 'bg-green-100',
            'text' => 'text-green-700',
            'border' => 'bg-blue-500',
            'icon' => 'bg-blue-50 text-blue-600',
        ],
        'inactive' => [
            'bg' => 'bg-gray-100',
            'text' => 'text-gray-700',
            'border' => 'bg-gray-500',
            'icon' => 'bg-gray-50 text-gray-600',
        ],
        'pending' => [
            'bg' => 'bg-orange-100',
            'text' => 'text-orange-700',
            'border' => 'bg-orange-500',
            'icon' => 'bg-orange-50 text-orange-600',
        ],
    ];

    $colors = $statusColors[$status] ?? $statusColors['active'];
@endphp

<div
    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow duration-200">
    <div class="h-1 {{ $colors['border'] }}"></div>
    <div class="p-6">
        <div class="{{ $colors['icon'] }} w-10 h-10 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 384 512">
                <path
                    d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z">
                </path>
            </svg>
        </div>

        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $name }}</h3>

        <div class="flex items-center gap-1 text-sm text-gray-500 mb-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 320 512">
                <path
                    d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                </path>
            </svg>
            <a href="{{ $googleMapsLink }}" target="_blank"
                class="hover:text-blue-600 hover:underline">{{ $address }}</a>
        </div>

        @if ($phone)
            <div class="flex items-center gap-1 text-sm text-gray-500 mb-3">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 512 512">
                    <path
                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z">
                    </path>
                </svg>
                <span>{{ $phone }}</span>
            </div>
        @endif

        <span class="{{ $colors['bg'] }} {{ $colors['text'] }} px-2 py-1 rounded-full text-xs font-medium capitalize">
            {{ $status }}
        </span>

        <div class="border-t border-gray-100 pt-4 mt-4">
            <div class="flex justify-between text-center">
                <div>
                    <div class="text-lg font-semibold text-gray-900">{{ count($management) }}</div>
                    <div class="text-xs text-gray-500">Management</div>
                </div>
                <div>
                    <div class="text-lg font-semibold text-gray-900">{{ count($operators) }}</div>
                    <div class="text-xs text-gray-500">Operators</div>
                </div>
                <div>
                    <div class="text-lg font-semibold text-gray-900">{{ $vouchers }}</div>
                    <div class="text-xs text-gray-500">Vouchers</div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 pt-4 mt-4">
            <div class="flex justify-between items-center">
                <a href="{{ $viewRoute }}" class="text-blue-600 hover:text-blue-700 text-sm">View Details</a>
                <div class="flex items-center gap-2">
                    <a href="{{ $editRoute }}" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512">
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z">
                            </path>
                        </svg>
                    </a>
                    <form action="{{ $deleteRoute }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512">
                                <path
                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

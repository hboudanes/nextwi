@props([
    'code' => '',
    'location' => '',
    'validUntil' => '',
    'used' => 0,
    'total' => 100,
    'status' => 'active',
    'editRoute' => '#',
    'deleteRoute' => '#',
])

@php
    $statusColors = [
        'active' => ['bg' => 'bg-green-100', 'text' => 'text-green-700'],
        'expired' => ['bg' => 'bg-red-100', 'text' => 'text-red-700'],
        'used' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700'],
    ];

    $colors = $statusColors[$status] ?? $statusColors['active'];
@endphp

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-lg transition-all">
    <div class="flex items-start justify-between mb-4">
        <div class="text-xl font-bold text-gray-900 font-mono">{{ $code }}</div>
        <span class="{{ $colors['bg'] }} {{ $colors['text'] }} px-2 py-1 rounded-full text-xs font-medium capitalize">
            {{ $status }}
        </span>
    </div>

    @if ($location)
        <div class="flex items-center gap-1 text-sm text-gray-600 mb-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 320 512">
                <path
                    d="M16 144a144 144 0 1 1 288 0A144 144 0 1 1 16 144zM160 80c8.8 0 16-7.2 16-16s-7.2-16-16-16c-53 0-96 43-96 96c0 8.8 7.2 16 16 16s16-7.2 16-16c0-35.3 28.7-64 64-64zM128 480V317.1c10.4 1.9 21.1 2.9 32 2.9s21.6-1 32-2.9V480c0 17.7-14.3 32-32 32s-32-14.3-32-32z">
                </path>
            </svg>
            <span>{{ $location }}</span>
        </div>
    @endif

    <div class="text-sm text-gray-600 mb-4">Valid until {{ $validUntil }}</div>

    <div class="flex items-center justify-between text-sm">
        <span class="text-gray-500">Used: {{ $used }}/{{ $total }}</span>
        <div class="flex items-center gap-2">
            <a href="{{ $editRoute }}" class="text-blue-600 hover:text-blue-700">
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

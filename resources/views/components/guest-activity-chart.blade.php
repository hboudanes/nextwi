@props([
    'data' => [],
])

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Guest Activity</h3>
    <div class="h-64 flex items-end justify-between gap-2">
        @foreach ($data as $item)
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-blue-500 rounded-t-lg hover:bg-blue-600 transition-colors relative group"
                    style="height: {{ ($item['count'] / max(array_column($data, 'count'))) * 100 }}%">
                    <span
                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-semibold text-gray-900 opacity-0 group-hover:opacity-100 transition-opacity">
                        {{ $item['count'] }}
                    </span>
                </div>
                <span class="text-xs text-gray-600">{{ $item['label'] }}</span>
            </div>
        @endforeach
    </div>
</div>

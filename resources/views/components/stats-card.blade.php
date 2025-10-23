@props([
    'icon' => '',
    'iconBg' => 'bg-blue-100',
    'iconColor' => 'text-blue-600',
    'value' => '0',
    'label' => '',
    'badge' => null,
    'badgeColor' => 'text-gray-500',
])

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-shadow duration-200">
    <div class="w-12 h-12 {{ $iconBg }} {{ $iconColor }} rounded-full flex items-center justify-center mb-3">
        {!! $icon !!}
    </div>
    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $value }}</div>
    <div class="text-sm font-medium text-gray-500 mb-2">{{ $label }}</div>
    @if ($badge)
        <div class="text-xs {{ $badgeColor }}">{{ $badge }}</div>
    @endif
</div>

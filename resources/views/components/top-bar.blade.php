@props(['title', 'subtitle' => '', 'routeName' => null, 'buttonName' => 'Back to List'])

<div class="bg-white border-b border-gray-200 px-6 py-4 mt-16 lg:mt-0">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
            @if (!empty($subtitle))
                <p class="text-sm text-gray-500 mt-1">{{ $subtitle }}</p>
            @endif
        </div>

        @isset($routeName)
            <a href="{{ route($routeName) }}"
                {{ $attributes->merge(['class' => 'px-4 py-2  rounded-lg hover:bg-gray-700  flex items-center gap-2']) }}>
                @isset($buttonSvg)
                    {!! $buttonSvg !!}
                @endisset

                <span>{{ $buttonName }}</span>
            </a>
        @endisset
    </div>
</div>

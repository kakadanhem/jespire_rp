@props([
    'style' => ''
])

<th class="px-6 py-3 border-b-2 border-gray-400 text-left leading-4 text-gray-700 tracking-wider" style="{{ $style }}">{{ $slot }}</th>

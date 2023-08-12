@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-400 px-3 text-md font-medium leading-5 
                    text-gray-900 focus:outline-none hover:bg-blue-50 focus:border-blue-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent px-3 text-md font-medium leading-5 
                    text-gray-600 hover:text-white hover:bg-blue-800 focus:outline-none focus:text-gray-300 focus:border-green-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

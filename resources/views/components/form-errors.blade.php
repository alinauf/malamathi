@props(['messages'])

@if ($messages->any())
    <div>
    <h3 class="text-sm mt-4 text-red-600">There were some errors with your submission</h3>
    <p class="text-sm flex">
    <ul {{ $attributes->merge(['class' => 'flex-row text-sm text-gray-600 space-y-1']) }}>
        @foreach ($messages->all() as $message)
            <li>* {{ $message }}</li>
        @endforeach
    </ul>
    </p>
    </div>
@endif

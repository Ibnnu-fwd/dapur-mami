@props(['primary' => true])

<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm text-white ' .
            ($primary === true ? ' bg-green-600 hover:bg-green-500' : ' bg-gray-700 hover:bg-gray-600') .
            ' focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>

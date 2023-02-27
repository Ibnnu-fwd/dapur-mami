@props(['route' => '', 'color' => 'green'])

<a href="{{ $route }}" {!! $attributes->merge([
    'class' =>
        'inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm text-white bg-' .
        $color .
        '-600 hover:bg-' .
        $color .
        '-700 focus:bg-' .
        $color .
        '-700 active:bg-' .
        $color .
        '-900 focus:outline-none focus:ring-2 focus:ring-' .
        $color .
        '-500 focus:ring-offset-2 transition ease-in-out duration-150',
]) !!}>{{ $slot }}</a>

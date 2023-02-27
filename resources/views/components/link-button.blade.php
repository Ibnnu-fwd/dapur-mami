@props(['route' => '', 'active' => false])

<a href="{{ $route }}" {!! $attributes->merge([
    'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm text-white hover:bg-primary-700 focus:bg-primary-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150'
]) !!}>{{ $slot }}</a>

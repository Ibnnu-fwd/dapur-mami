<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <x-input id="email" label="Email" name="email" type="email" required autofocus />

        <!-- Password -->
        <x-input id="password" label="Password" name="password" type="password" required />

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600"
                    href="{{ route('register') }}">
                    {{ __('Tidak punya akun?') }}
                </a>
            @endif

            <x-button class="ml-3">Masuk</x-button>
        </div>
    </form>
</x-guest-layout>

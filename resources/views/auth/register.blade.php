<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-2 gap-x-4">
            <x-input id="first_name" label="Nama Depan" name="first_name" type="text" required autofocus />
            <x-input id="last_name" label="Nama Belakang" name="last_name" type="text" required autofocus />
        </div>

        <x-input id="fullname" label="Nama Lengkap" name="fullname" type="text" required autofocus />

        <div class="form-control mb-4">
            <label class="label">
                <span class="font-medium text-sm text-gray-700 2xl:label-text">Jenis Kelamin</span>
            </label>
            <label class="input-group">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="radio" name="sex" value="male" class="radio checked:bg-primary" />
                        <span class="text-sm text-gray-700 2xl:label-text bg-transparent">Pria</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="radio" name="sex" value="female" class="radio checked:bg-primary" />
                        <span class="text-sm text-gray-700 2xl:label-text bg-transparent">Wanita</span>
                    </label>
                </div>
            </label>
        </div>

        <x-input-single-datepicker label="Tanggal Lahir" id="birth_date" class="block w-full" type="text"
            name="birth_date" required autocomplete="off" required />

        <x-input id="phone" label="Nomor Telepon" name="phone" type="text" required autofocus
            autocomplete="off" />

        <x-textarea id="address" label="Alamat" name="address" required></x-textarea>

        <x-input id="email" label="Email" name="email" type="email" required autofocus />

        <x-input id="password" label="Password" name="password" type="password" required autofocus />

        <x-input id="password_confirmation" label="Konfirmasi Password" name="password_confirmation" type="password"
            required autofocus />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-button type="submit" class="ml-3">
                {{ __('Daftar') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>

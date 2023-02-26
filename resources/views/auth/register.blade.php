<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid grid-cols-2 gap-x-4">
            <x-input id="first_name" label="Nama Depan" name="first_name" type="text" required />
            <x-input id="last_name" label="Nama Belakang" name="last_name" type="text" required />
        </div>
        <x-input id="fullname" label="Nama Lengkap" name="fullname" type="text" required />
        <div class="form-control mb-4">
            <label class="label">
                <span class="font-medium text-sm text-gray-700 2xl:label-text">Jenis Kelamin</span>
            </label>
            <label class="input-group">
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="radio" name="sex" value="1" class="radio checked:bg-primary" />
                        <span class="text-sm text-gray-700 2xl:label-text bg-transparent">Pria</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <input type="radio" name="sex" value="2" class="radio checked:bg-primary" />
                        <span class="text-sm text-gray-700 2xl:label-text bg-transparent">Wanita</span>
                    </label>
                </div>
            </label>
        </div>
        <x-input-single-datepicker label="Tanggal Lahir" id="birth_date" class="block w-full" type="text"
            name="birth_date" required autocomplete="off" required />
        <x-input id="phone" label="Nomor Telepon" name="phone" type="text" required autocomplete="off" />
        <x-textarea id="address" label="Alamat" name="address" required></x-textarea>
        <x-input id="email" label="Email" name="email" type="email" required />
        <x-input id="password" label="Password" name="password" type="password" required />
        <x-input id="password_confirmation" label="Konfirmasi Password" name="password_confirmation" type="password"
            required />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-button type="submit" class="ml-3">
                {{ __('Daftar') }}
            </x-button>
        </div>
    </form>

    @push('js-internal')
        <script>
            $(function() {
                let fullname = '';
                $('#first_name').on('keyup', function() {
                    fullname = $(this).val() + ' ' + $('#last_name').val();
                    $('#fullname').val(fullname);
                });
                $('#last_name').on('keyup', function() {
                    fullname = $('#first_name').val() + ' ' + $(this).val();
                    $('#fullname').val(fullname);
                });

                @if (Session::has('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: '{{ Session::get('success') }}'
                    });
                @endif

                @if (Session::has('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: '{{ Session::get('error') }}'
                    });
                @endif
            });
        </script>
    @endpush


</x-guest-layout>

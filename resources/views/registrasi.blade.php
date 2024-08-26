@extends('layouts.auth')
@section('contentMain')
    <div class="flex justify-center  bg-white">
        <div class="p-10 w-full max-w-lg bg-white rounded-2xl shadow-xl shadow-gray-300">
            <div class="space-y-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    Registrasi
                </h2>

                <form action="{{ route('registrasi') }}" method="POST" class="mt-8 space-y-6" onsubmit="return validateForm()">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="isiemail@gmail.com" required>
                    </div>
                    <div>
                        <label for="password_initial" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password_initial" id="password_initial" placeholder="••••••••"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Ulangi
                            Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="081234567890" oninput="validateNumberInput(this)" required />
                    </div>

                    <button type="submit"
                        class="py-3 px-5 w-full text-base font-medium text-center text-white bg-gradient-to-br from-pink-500 to-purple-500 hover:scale-[1.02] shadow-md shadow-gray-300 transition-transform rounded-lg sm:w-auto">Buat
                        Akun</button>
                    <div class="text-sm font-medium text-gray-500">
                        Sudah punya akun? <a href="{{ route('index') }}" class="text-fuchsia-600 hover:underline">Masuk di
                            sini!</a>
                    </div>
                    {{-- <div class="text-sm font-medium text-gray-500">
                        Not registered? <a href="{{< ref "/sign-up.html" >}}" class="text-fuchsia-600 hover:underline">Create account</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateNumberInput(input) {
            // Save the original value
            const originalValue = input.value;

            // Remove non-numeric characters
            const cleanedValue = originalValue.replace(/[^0-9]/g, '');

            // If the cleaned value is different from the original, update the input field
            if (cleanedValue !== originalValue) {
                alert('Hanya masukan angka');
                input.value = cleanedValue;
            }
        }

        function validatePassword() {
            const password = document.getElementById('password-initial').value;
            const passwordVerif = document.getElementById('password').value;
            const message = document.getElementById('message');

            if (password === passwordVerif) {
                message.textContent = 'Passwords match!';
                message.style.color = 'green';
            } else {
                message.textContent = 'Passwords do not match!';
                message.style.color = 'red';
                alert('Password Tidak Sama');

            }
        }

        function validateForm() {
            let valid = true;

            // Validate phone number
            const phoneNumber = document.getElementById('phone_number');
            if (/[^0-9]/.test(phoneNumber.value)) {
                alert('Hanya masukan nomor telepon');
                valid = false;
            }

            return valid;
        }
    </script>
@endsection

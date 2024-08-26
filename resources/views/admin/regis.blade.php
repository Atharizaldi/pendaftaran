@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center  bg-white">
        <div class="p-10 w-full max-w-lg bg-white rounded-2xl shadow-xl shadow-gray-300">
            <div class="space-y-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    Registrasi
                </h2>

                <form action="{{ route('regispeserta') }}" method="POST" class="mt-8 space-y-6"
                    onsubmit="return validateForm()">
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
                alert('Please enter only numbers.');
                input.value = cleanedValue;
            }
        }

        function validateForm() {
            let valid = true;

            // Validate phone number
            const phoneNumber = document.getElementById('phone_number');
            if (/[^0-9]/.test(phoneNumber.value)) {
                alert('Please enter only numbers for Phone Number.');
                valid = false;
            }

            // Validate NISN
            const nisn = document.getElementById('nisn');
            if (/[^0-9]/.test(nisn.value)) {
                alert('Please enter only numbers for NISN.');
                valid = false;
            }

            return valid;
        }
    </script>
@endsection

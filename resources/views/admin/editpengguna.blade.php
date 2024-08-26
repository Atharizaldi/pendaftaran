@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center  bg-white">
        <div class="p-10 w-full max-w-lg bg-white rounded-2xl shadow-xl shadow-gray-300">
            <div class="space-y-8">
                <h2 class="text-2xl font-bold text-gray-900">
                    Ubah User
                </h2>

                <form action="{{ route('updatepengguna', $account->user_id) }}" method="POST" class="mt-8 space-y-6"
                    onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="isiemail@gmail.com" value="{{ old('email', $account->email) }}" required>
                    </div>
                    <div>
                        <label for="password_initial" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password_initial" id="password_initial" placeholder="••••••••"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Ulangi
                            Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="081234567890" value="{{ old('phone_number', $account->phone_number) }}"
                            oninput="validateNumberInput(this)" required />
                    </div>

                    <button type="submit"
                        class="py-3 px-5 w-full text-base font-medium text-center text-white bg-gradient-to-br from-pink-500 to-purple-500 hover:scale-[1.02] shadow-md shadow-gray-300 transition-transform rounded-lg sm:w-auto">Buat
                        Akun</button>

                </form>
            </div>
        </div>
    </div>
@endsection

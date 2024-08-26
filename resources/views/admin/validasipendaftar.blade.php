@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center  p-5 bg-white">
        <div
            class="bg-white rounded-lg shadow-lg p-8 md:p-12 lg:p-5 mx-4 md:mx-auto w-full max-w-md md:max-w-lg lg:max-w-5xl">
            <h1 class="text-start text-3xl font-bold mb-6">Data Pendaftaran Mahasiswa</h1>
            <form action="{{ route('updatependaftar', $account->user_id) }}" method="POST" onsubmit="return validateForm()"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4 my-2">

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ $account->nama_lengkap }}" />
                        <label for="nama_lengkap"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                            Lengkap</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="alamat_ktp" name="address_ktp"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ $account->address_ktp }}" />
                        <label for="alamat_ktp"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat
                            KTP</label>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="alamat_now" name="address_now"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ $account->address_now }}" />
                        <label for="alamat_now"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat
                            Domisili</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="kecamatan" name="kecamatan"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required value="{{ $account->kecamatan }}" />
                        <label for="kecamatan"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kecamatan</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-1/2">
                            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-700">Pilih
                                Provinsi</label>
                            <div class="relative mb-4 ">
                                <label for="province_id"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Silahkan
                                    Pilih Provinsi</label>
                                <select id="province_id" name="province_id"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option selected value="">Silahkan Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->province_id }}"
                                            {{ $account->province_id == $province->province_id ? 'selected' : '' }}>
                                            {{ $province->province }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-1/2">
                            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-700">Pilih Kota</label>
                            <div class="relative mb-4">
                                <label for="city_id"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kecamatan</label>
                                <select id="city_id" name="city_id"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option disabled selected value="">Silahkan Pilih Kota</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city_id }}" data-province-id="{{ $city->province_id }}"
                                            {{ $account->city_id == $city->city_id ? 'selected' : '' }}>
                                            {{ $city->type }} {{ $city->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="flex flex-row gap-2">


                        <div class="relative z-0 w-1/2  mb-5 group">
                            <input type="text" id="phone_number" name="phone_number"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ $account->phone_number }}" placeholder="081XXXXXXXX"
                                oninput="validateNumberInput(this)" required />
                            <label for="telp_number"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                                Handphone</label>
                        </div>

                        <div class="relative z-0 w-1/2  mb-5 group">
                            <input type="text" id="email" name="email"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="emailpeserta@gmail.com" required value="{{ $account->email }}" required />
                            <label for="email"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        </div>
                    </div>





                    <div class="mb-4">
                        <label for="kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-700">Pilih
                            Kewarganegaraan</label>
                        <select id="kewarganegaraan" name="kewarganegaraan"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            onchange="toggleNegaraLahir()">
                            <option disabled selected value="">Kewarganegaraan</option>
                            <option disabled selected value="">Silahkan Pilih Kewarganegaraan</option>
                            <option value="wni" {{ $account->kewarganegaraan == 'wni' ? 'selected' : '' }}>
                                WNI
                            </option>
                            <option value="wni keturunan"
                                {{ $account->kewarganegaraan == 'wni keturunan' ? 'selected' : '' }}>
                                WNI Keturunan
                            </option>
                            <option value="wna" {{ $account->kewarganegaraan == 'wna' ? 'selected' : '' }}>
                                WNA
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Lahir
                            (Sesuai Ijazah)</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="tgl_lahir" datepicker datepicker-autohide type="text" name="tgl_lahir"
                                value="{{ $account->tgl_lahir }}" datepicker-format="dd-mm-yyyy"
                                class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="Select date">
                        </div>
                    </div>


                    <div class="mb-4" id="nama_kewarganegaraan_container" style="display: none;">
                        <label for="nama_kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-700">Nama
                            Negara
                            Kewarganegaraan</label>
                        <input type="text" id="nama_kewarganegaraan" name="nama_kewarganegaraan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $account->nama_kewarganegaraan }}" placeholder="Nama Negara Kewarganegaraan Anda"
                            required />
                    </div>
                    <div class="mb-4" style="display: none;">
                        <label for="province_id_lahir" class="block mb-2 text-sm font-medium text-gray-700">Provinsi
                            Kelahiran</label>
                        <select id="province_id_lahir" name="province_id_lahir"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option disabled selected value="">Silahkan Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->province_id }}"
                                    {{ $account->province_id_lahir == $province->province_id ? 'selected' : '' }}>
                                    {{ $province->province }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4" style="display: none;">
                        <label for="city_id_lahir" class="block mb-2 text-sm font-medium text-gray-700">Kota/Kabupaten
                            Kelahiran</label>
                        <select id="city_id_lahir" name="city_id_lahir"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option disabled selected value="">Silahkan Pilih Kota</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_id }}" data-province-id="{{ $city->province_id }}"
                                    {{ $account->city_id_lahir == $city->city_id ? 'selected' : '' }}>
                                    {{ $city->type }} {{ $city->city_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4" style="display: none;">
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tempat Lahir
                            (Sesuai Ijazah)</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $account->tempat_lahir }}" placeholder="Tempat Lahir Anda" required />
                    </div>
                    <div id="negara_lahir_container" class="mb-4" style="display: none">
                        <label for="negara_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tempat Lahir
                            Luar Negeri</label>
                        <input type="text" id="negara_lahir" name="negara_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ $account->negara_lahir }}" placeholder="Tempat Lahir Anda" />
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-700">Jenis
                            Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option disabled selected value="">Silahkan Pilih Jenis Kelamin</option>
                            <option value="pria" {{ $account->jenis_kelamin == 'pria' ? 'selected' : '' }}>
                                Pria
                            </option>
                            <option value="wanita" {{ $account->jenis_kelamin == 'wanita' ? 'selected' : '' }}>
                                Wanita
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status_menikah" class="block mb-2 text-sm font-medium text-gray-700">Status
                            Menikah</label>
                        <select id="status_menikah" name="status_menikah"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option disabled selected value="">Silahkan Pilih Status Menikah</option>
                            <option value="belum menikah" {{ $account->status_menikah == 'menikah' ? 'selected' : '' }}>
                                Menikah
                            </option>
                            <option value="menikah" {{ $account->status_menikah == 'belum menikah' ? 'selected' : '' }}>
                                Belum Menikah
                            </option>
                            <option value="lain" {{ $account->status_menikah == 'lain' ? 'selected' : '' }}>
                                Lain-lain(Janda/Duda)
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="agama_id" class="block mb-2 text-sm font-medium text-gray-700">Agama</label>
                        <select id="agama_id" name="agama_id"
                            class="block py-2.5 px-2.5 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option disabled selected value="">Silahkan Pilih Agama Anda</option>
                            @foreach ($agamas as $agama)
                                <option value="{{ $agama->agama_id }}"
                                    {{ $account->agama_id == $agama->agama_id ? 'selected' : '' }}>
                                    {{ $agama->name_agama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Foto -->
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="foto">Pas Foto</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            name="foto" aria-describedby="foto" id="foto" type="file"
                            accept=".jpg, .jpeg, .png" onchange="previewFoto(event)">

                        <div class="mt-2">

                            <img id="foto-preview" src="{{ asset('storage/foto/' . $account->foto) }}" alt="Foto"
                                class="h-40 object-cover {{ $account->foto ? '' : 'hidden' }}">
                            <a id="foto-link" href="{{ asset('storage/foto/' . $account->foto) }}" target="_blank"
                                class="text-blue-500 {{ $account->foto ? '' : 'hidden' }}">
                                {{ $account->foto }}
                            </a>
                        </div>
                    </div>

                </div>

                <button type="submit"
                    class="py-3 px-5 w-full text-base font-medium text-center text-white bg-gradient-to-br from-blue-500 to-blue-300 hover:scale-[1.02] shadow-md shadow-gray-300 transition-transform rounded-lg ">Update
                    Data</button>
            </form>
        </div>
    </div>


    <script>
        function previewFoto(event) {
            const input = event.target;
            const preview = document.getElementById('foto-preview');
            const link = document.getElementById('foto-link');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    link.classList.add('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewVideo(event) {
            const input = event.target;
            const preview = document.getElementById('video-preview');
            const link = document.getElementById('video-link');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    link.classList.add('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

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

            // Validate telp number
            const telpNumber = document.getElementById('telp_number');
            if (/[^0-9]/.test(telpNumber.value)) {
                alert('Please enter only numbers for Telp Number.');
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
    <script>
        function toggleNegaraLahir() {
            var kewarganegaraan = document.getElementById('kewarganegaraan').value;
            var namaKewarganegaraanContainer = document.getElementById('nama_kewarganegaraan_container');
            var namaKewarganegaraanInput = document.getElementById('nama_kewarganegaraan');
            var negaraLahirContainer = document.getElementById('negara_lahir_container');
            var negaraLahirInput = document.getElementById('negara_lahir');

            var provinceLahirContainer = document.getElementById('province_id_lahir').parentElement;
            var cityLahirContainer = document.getElementById('city_id_lahir').parentElement;
            var tempatLahirContainer = document.getElementById('tempat_lahir').parentElement;

            if (kewarganegaraan === 'wna') {
                namaKewarganegaraanContainer.style.display = 'block';
                namaKewarganegaraanInput.required = true;
                negaraLahirContainer.style.display = 'block';
                negaraLahirInput.required = true;

                provinceLahirContainer.style.display = 'none';
                cityLahirContainer.style.display = 'none';
                tempatLahirContainer.style.display = 'none';
            } else {
                namaKewarganegaraanContainer.style.display = 'none';
                namaKewarganegaraanInput.value = ''; // Menghapus nilai input "Negara Kewarganegaraan"
                namaKewarganegaraanInput.required = false;
                negaraLahirContainer.style.display = 'none';
                negaraLahirInput.value = ''; // Menghapus nilai input "Negara Kelahiran"
                negaraLahirInput.required = false;

                provinceLahirContainer.style.display = 'block';
                cityLahirContainer.style.display = 'block';
                tempatLahirContainer.style.display = 'block';
            }
        }

        // Call the function on page load to set the initial state
        window.onload = function() {
            toggleNegaraLahir();
        };
    </script>
@endsection

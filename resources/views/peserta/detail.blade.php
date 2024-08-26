@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center mt-[-1.51rem] bg-white overflow-auto h-full" id="printform">
        <div class="bg-white rounded-lg shadow-lg p-1 mx-4 md:mx-auto w-full max-w-md md:max-w-lg lg:max-w-5xl">
            <h1 class="text-center text-xl font-bold pt-10">Formulir Bukti Pendaftaran</h1>
            <div class=" flex justify-center">

            </div>
            <div class="grid grid-cols-3 gap-4 mt-5">
                <div class="p-">
                    <div class="mt-2">
                        <img id="foto-preview" src="{{ asset('storage/foto/' . $account->foto) }}" alt="Foto"
                            class="h-40 object-cover {{ $account->foto ? '' : 'hidden' }}">

                    </div>
                </div>
                <div class="p-2">

                    <div class="mb-2">
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama
                            Lengkap</label>
                        <div class="font-bold text-lg ">{{ $account->nama_lengkap }}</div>
                    </div>

                    <div class="mb-2">
                        <label for="alamat_ktp" class="block mb-2 text-sm font-medium text-gray-700">Alamat Berdasarkan
                            KTP</label>
                        <div class="font-bold text-lg ">{{ $account->address_ktp }}</div>

                    </div>
                    <div class="mb-2">
                        <label for="alamat_now" class="block mb-2 text-sm font-medium text-gray-700">Alamat Saat
                            Ini</label>
                        <div class="font-bold text-lg ">{{ $account->address_now }}</div>

                    </div>
                    <div class="mb-2">
                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-700">Kecamatan</label>
                        <div class="font-bold text-lg ">{{ $account->kecamatan }}</div>

                    </div>

                    <div class="mb-2">
                        <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-700">Provinsi</label>
                        <div class="font-bold text-lg ">{{ $account->province->province }}</div>

                    </div>

                    <div class="mb-2">
                        <label for="kota" class="block mb-2 text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                        <div class="font-bold text-lg ">{{ $account->city->city_name }}</div>
                    </div>

                    <div class="mb-2">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-700">Nomor
                            Handphone</label>
                        <div class="font-bold text-lg ">{{ $account->phone_number }}</div>

                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <div class="font-bold text-lg ">{{ $account->email }}</div>

                    </div>
                </div>
                <div class="p-2">
                    <div class="mb-2">
                        <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal
                            Lahir</label>
                        <div class="font-bold text-lg ">{{ $account->tgl_lahir }}</div>

                    </div>
                    <div class="mb-2">
                        <label for="kewarganegaraan"
                            class="block mb-2 text-sm font-medium text-gray-700">Kewarganegaraan</label>
                        <div class="font-bold text-lg ">{{ $account->kewarganegaraan }}</div>

                    </div>

                    @if (auth()->user()->kewarganegaraan == 'wna')
                        <div class="mb-2" id="nama_kewarganegaraan_container">
                            <label for="nama_kewarganegaraan" class="block mb-2 text-sm font-medium text-gray-700">Nama
                                Negara
                                Kewarganegaraan</label>
                            <div class="font-bold text-lg ">{{ $account->nama_kewarganegaraan }}</div>
                        </div>
                        <div id="negara_lahir_container" class="mb-2">
                            <label for="negara_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tempat Lahir
                                Luar
                                Negeri</label>
                            <div class="font-bold text-lg ">{{ $account->negara_lahir }}</div>
                        </div>
                    @else
                        <div class="mb-2">
                            <label for="province_id_lahir" class="block mb-2 text-sm font-medium text-gray-700">Provinsi
                                Kelahiran</label>
                            <div class="font-bold text-lg ">{{ $account->province->province }}</div>

                        </div>

                        <div class="mb-2">
                            <label for="city_id_lahir" class="block mb-2 text-sm font-medium text-gray-700">Kota/Kabupaten
                                Kelahiran</label>
                            <div class="font-bold text-lg ">{{ $account->city->city_name }}</div>

                        </div>

                        <div class="mb-2">
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tempat
                                Lahir</label>
                            <div class="font-bold text-lg ">{{ $account->tempat_lahir }}</div>

                        </div>
                    @endif
                    <div class="mb-2">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-700">Jenis
                            Kelamin</label>
                        <div class="font-bold text-lg ">{{ $account->jenis_kelamin }}</div>
                    </div>
                    <div class="mb-2">
                        <label for="status_menikah" class="block mb-2 text-sm font-medium text-gray-700">Status
                            Menikah</label>
                        <div class="font-bold text-lg ">{{ $account->status_menikah }}</div>

                    </div>
                    <div class="mb-2">
                        <label for="agama_id" class="block mb-2 text-sm font-medium text-gray-700">Agama</label>
                        <div class="font-bold text-lg ">{{ $account->agama->name_agama }}</div>

                    </div>
                    <!-- Foto -->


                    <!-- Video -->

                </div>
                {{-- </div> --}}
            </div>


        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function exportPdf() {
            var element = document.getElementById("printform");
            var opt = {
                margin: [0, 0, 1, 0], // [atas, kanan, bawah, kiri]
                filename: 'Bukti Pendaftaran.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            html2pdf().from(element).set(opt).save()
        }
        window.onload = function() {
            exportPdf(); // Memanggil fungsi downloadPdf()
        };
    </script>
@endsection

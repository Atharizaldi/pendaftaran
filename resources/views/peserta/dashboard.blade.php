@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center bg-white">

        <div class="bg-white rounded-lg shadow-lg p-8 mx-4 md:mx-auto w-full max-w-md md:max-w-lg lg:max-w-xl">
            <h1 class="text-center text-3xl font-bold mb-6">Anda Sudah Melakukan Pendaftaran</h1>

            <div class="flex flex-col justify-center gap-3 p-3">

                <button class="">
                    <button onclick="openAndDownload()"
                        class="p-2 rounded-md bg-gradient-to-br from-blue-400 to-blue-600 text-white font-semibold flex items-center justify-center space-x-2">
                        <span>Download Bukti Pendaftaran</span>
                    </button>
                </button>
                <button>
                    <a href="/detailpeserta"
                        class="p-2 rounded-md bg-gradient-to-br from-red-400 to-red-600 text-white font-semibold flex items-center justify-center space-x-2">

                        <span>Logout</span>
                    </a>
                </button>
            </div>
        </div>
    </div>
    <script>
        function openAndDownload() {
            var win = window.open('/detailpeserta');

            // setTimeout(function() {
            //     win.close(); // Menutup tab setelah beberapa saat (pastikan download sudah selesai)
            // }, 3000); // Atur waktu sesuai dengan durasi download
        }
    </script>
@endsection

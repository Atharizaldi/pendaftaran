@extends('layouts.admin')

@section('contentMain')
    <div class="flex justify-center bg-white p-5">
        <div class="bg-white rounded-lg shadow-lg p-8 mx-4 md:mx-auto w-full max-w-full">
            <h1 class="text-start text-3xl font-bold mb-6">Kelola Pengguna</h1>

            <div class="flex flex-row justify-between mb-6">
                <!-- Search and Filter Form -->
                <div class="w-1/2">
                    <form method="GET" action="{{ route('listakunpengguna') }}"
                        class="flex flex-col md:flex-row md:items-center gap-4">
                        <!-- Search Input -->
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari email..."
                            class="w-full md:w-1/3 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <!-- Filter Select -->


                        <!-- Apply Button -->
                        <button type="submit"
                            class="sm:inline-flex text-white bg-gradient-to-br from-red-500 to-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                            Cari
                        </button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('halamanregis') }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="sm:inline-flex ml-5 text-white bg-gradient-to-br from-red-500 to-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">

                            Tambah User
                        </button>
                    </form>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                        <tr>
                            <th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">No</th>
                            <th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">Email</th>

                            <th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">Nomor Telepon</th>
                            <th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">Pendaftaran</th>
                            <th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($accounts->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada Pengguna
                                </td>
                            </tr>
                        @endif
                        @foreach ($accounts as $index => $account)
                            <tr>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $index + 1 }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $account->email }}</td>

                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    {{ $account->phone_number }}</td>
                                <td class="py-2 px-4 text-sm text-gray-900 capitalize">{{ $account->status_daftar }}</td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                    <div class="flex justify-start gap-3">
                                        <a href="{{ route('editpengguna', $account->user_id) }}"
                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                            <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Ubah user
                                        </a>
                                        <form action="{{ route('hapusPengguna', $account->user_id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Hapus user
                                            </button>
                                        </form>
                                        @if ($account->status_daftar == 'sudah daftar')
                                            <a href="{{ route('detailpendaftaran', $account->user_id) }}"
                                                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-green-400 to-green-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                <span class="material-symbols-outlined mr-2">
                                                    visibility
                                                </span>
                                                Lihat Pendaftaran
                                            </a>
                                        @endif
                                        <!-- New delete button -->


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

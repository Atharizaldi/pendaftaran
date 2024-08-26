@extends('layouts.app')

@section('content')
    <div class="">
        <nav class="fixed z-30 w-full bg-gray-50">
            <div class="py-3 px-3 lg:px-5 lg:pl-3">
                <div class="flex justify-between items-center shadow-md pb-5 px-10">
                    <div class="flex justify-start items-center">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                            class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a href="" class="text-md font-semibold flex items-center lg:mr-1.5">
                            {{-- <img src="/images/logo.svg" class="mr-2 h-8" alt="Creative Tim Logo"> --}}
                            <span class="hidden md:inline-block self-center text-xl font-bold whitespace-nowrap">System
                                Pendaftaran</span>
                        </a>

                    </div>
                    <div class="flex items-center">
                        <!-- Search mobile -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="sm:inline-flex ml-5 text-white bg-gradient-to-br from-red-400 to-red-600  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">

                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        {{-- <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-white text-lg font-bold">
                    MyApp
                </a>

                <!-- Hamburger menu for mobile -->
                <div class="block lg:hidden">
                    <button id="nav-toggle" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navbar items -->
                <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="nav-content">
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                        <li class="nav-item">
                            <a href="#" class="text-white px-3 py-2 flex items-center text-sm uppercase font-bold">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="text-white px-3 py-2 flex items-center text-sm uppercase font-bold">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="text-white px-3 py-2 flex items-center text-sm uppercase font-bold">
                                Contact
                            </a>
                        </li>
                    </ul>


                </div>
            </div>
        </nav> --}}

        <div class="min-h-screen bg-white p-5 pt-20">
            @yield('contentMain')
        </div>
    </div>

    <script>
        // Toggle menu on small screens
        document.getElementById('nav-toggle').addEventListener('click', function() {
            document.getElementById('nav-content').classList.toggle('hidden');
        });
    </script>
@endsection

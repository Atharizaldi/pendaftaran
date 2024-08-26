@extends('layouts.app')

@section('content')
    <div class="">
        <div class="min-h-screen bg-white p-5   ">
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

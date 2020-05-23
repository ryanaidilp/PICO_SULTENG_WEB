@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full mx-auto bg-gray-300">
    <div class="p-6 bg-blue-900 rounded-lg shadow-xl w-96">
        <span class="text-4xl font-bold text-white">PICO API</span>
        <h1 class="pt-4 text-2xl text-white">Daftar</h1>
        <h2 class="text-blue-200 text-muted">Silahkan isi informasi anda untuk mendaftar</h2>
        
        <form method="POST" action="{{ route('register') }}" class="pt-3">
            @csrf

            <div class="relative">
                <label for="name" class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Nama</label>

                <div>
                    <input id="name" type="text" class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="pt-1 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Alamat Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                    <span class="pt-1 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700" name="password" autocomplete="new-password">

                    @error('password')
                    <span class="pt-1 text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm" class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Konfirmasi Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div class="flex justify-between pt-3 text-sm font-bold text-white">
                <button type="submit" class="w-full px-3 py-2 mx-6 font-bold text-blue-800 uppercase bg-gray-400 rounded hover:bg-blue-400">
                    Daftar
                </button>
            </div>
            <div class="flex justify-between pt-3 text-sm font-bold text-white">
                Sudah punya akun?
                <a class="" href="{{ route('login') }}">
                    Masuk
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

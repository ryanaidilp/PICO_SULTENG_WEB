@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-full mx-auto bg-gray-300">
    <div class="p-6 bg-blue-900 rounded-lg shadow-xl w-96">
        <span class="text-4xl font-bold text-white">PICO API</span>
        <br>
        <span class="text-base text-white">Sistem Pembaharuan Data COVID-19 Sulawesi Tengah</span>
        <h1 class="pt-8 text-2xl text-white">Selamat Datang</h1>
        <h2 class="text-blue-200 text-muted">Silahkan isi informasi anda untuk masuk.</h2>

        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative">
                <label for="email" class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700"
                        name="email" value="{{ old('email') }}" autocomplete="email"
                        placeholder="username@mail.com" autofocus>

                    @error('email')
                    <span class="pt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password"
                    class="absolute px-3 pt-2 text-xs font-bold text-blue-500 uppercase">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="w-full p-3 pt-8 text-gray-100 bg-blue-800 rounded outline-none focus:bg-blue-700"
                        name="password" autocomplete="current-password">

                    @error('password')
                    <span class="pt-1 text-sm text-red-600" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="pt-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="text-white" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="pt-8">
                <button type="submit" class="w-full px-3 py-2 font-bold text-left text-blue-800 uppercase bg-gray-600 rounded hover:bg-gray-400">
                    Masuk
                </button>
            </div>
            <div class="flex justify-between pt-8 text-sm font-bold text-white">
                <a class="" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
                <a class="" href="{{ route('register') }}">
                    Daftar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="p-8 text-center">
        <h1 class="text-4xl font-hairline text-red-600"><i class="fas fa-door-open mr-6 shadow-lg"></i>Вход</h1>
    </div>

    <div class="p-8 text-center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="">
                <label for="email"
                       class="text-xl font-hairline text-gray-700 mb-2 block">E-Mail</label>
                <input
                    class="shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                    type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="font-hairline text-red-400 block text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <label class="text-xl font-hairline text-gray-700 mb-2 hover:border-red-600 block mt-6"
                       for="password">Пароль</label>
                <input class="shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                <span class="font-hairline text-red-400 block text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="mb-6 mt-6">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-sm font-hairline text-gray-700 hover:text-red-700 text-uppercase" for="remember">
                    Запомнить меня
                </label>
            </div>
            <div class="justify-around flex">
            <button
                class="flex-initial px-4 py-1 bg-red-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-red-400"
                type="submit">
                Вперед
            </button>

            @if (Route::has('password.request'))
                <a class="flex-initial text-sm font-hairline text-gray-700 hover:text-red-700 text-uppercase"
                   href="{{ route('password.request') }}">
                    Забыл пароль?
                </a>
            @endif
            </div>
        </form>
    </div>
@endsection

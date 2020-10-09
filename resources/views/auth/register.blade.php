@extends('layouts.app')

@section('content')

    <div class="p-8 text-center">
        <h1 class="uppercase text-4xl font-hairline text-red-600"><i class="fas fa-door-open mr-6"></i>Регистрация</h1>
    </div>

    <div class="p-8 text-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label
                    class="text-xl font-hairline text-gray-700 mb-2 block" for="name">Имя</label>
                <input
                    class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                    type="text" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="font-hairline text-red-400 block text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div>
                <label for="email" class="text-xl font-hairline text-gray-700 mb-2 block mt-6">E-Mail</label>
                <input type="email"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="font-hairline text-red-400 block text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <label for="password"
                       class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Пароль</label>
                <input type="password"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="font-hairline text-red-400 block text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <label for="password-confirm"
                       class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Повторите пароль</label>


                <input type="password"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       required autocomplete="new-password"
                       name="password_confirmation">
            </div>

            <div>
                <button type="submit"
                        name="submit_key"
                        value="user"
                        class="uppercase px-4 py-2 bg-red-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-red-400 mt-6">
                    Зарегистрироваться
                </button>

                <button type="submit"
                        name="submit_key"
                        value="rent_service_owner"
                        class="uppercase px-4 py-2 bg-blue-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-blue-400 mt-6">
                    Зарегистрировать свой сервис проката
                </button>
            </div>
        </form>
    </div>
@endsection

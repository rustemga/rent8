@extends('layouts.app')

@section('content')
    <div class="p-8 text-center">
        <h1 class="text-4xl font-hairline text-red-600"><i class="fas fa-house-user mr-6 shadow-lg"></i>Личный кабинет</h1>
        <p>Арендодатель</p>
    </div>
    <div class="p-8 text-center">
        <div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="p-8 text-center">
        <div>
            <router-link to="/rent-register" class="uppercase px-4 py-2 bg-blue-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-blue-400 mt-6">Register Rent</router-link>
            <router-view>
            </router-view>
        </div>
    </div>



@endsection

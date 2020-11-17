@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="w-1/6 rounded-lg shadow-xl mx-auto mt-10" src="\img\logo.jpg" alt="logo">
        <h1 class="uppercase text-4xl font-hairline text-red-600 mt-10 mb-10"><i class="fas fa-stream mr-6"></i>В
            прокате</h1>
    </div>
    <div class="flex flex-wrap mx-auto bg-red-600 py-10 justify-center">
        @foreach(range(1, 17) as $index)
            <rents-component></rents-component>
        @endforeach
    </div>

@endsection



@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="w-1/6 rounded-lg shadow-xl mx-auto mt-10" src="\img\logo.jpg" alt="logo">
        <h1 class="uppercase text-4xl font-hairline text-red-600 mt-10 mb-10"><i class="fas fa-stream mr-6"></i>В
            прокате</h1>
    </div>
    <p>
        <router-link to="/foo">Перейти к Foo</router-link>
        <router-link to="/bar">Перейти к Bar</router-link>
        <router-link to="/rent-register">Перейти к форме</router-link>
    </p>
    <router-view>
    </router-view>
    <div class="mx-auto bg-red-600 py-10">
        <rents-component></rents-component>
    </div>
@endsection


<script>
    import RentRegisterFormComponent from "../js/components/RentRegisterFormComponent";
    export default {
        components: {RentRegisterFormComponent}
    }
</script>

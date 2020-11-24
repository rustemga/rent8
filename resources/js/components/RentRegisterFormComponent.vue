<template>
    <div class="p-8 text-center">
        <h1>Rent Register </h1>
        <p>{{currentRoute}}</p>
        <form method="POST" action="">
            <div>
                <label
                    class="text-xl font-hairline text-gray-700 mb-2 block">Название</label>
                <input
                    class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                    type="text" name="name"
                    value="" autocomplete="name" autofocus>
            </div>

            <div>
                <label class="text-xl font-hairline text-gray-700 mb-2 block mt-6">E-Mail</label>
                <input type="email"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       name="email" autocomplete="email">
            </div>

            <div>
                <label
                       class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Пароль</label>
                <input type="password"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       name="password">
            </div>

            <div>
                <label
                       class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Повторите пароль</label>
                <input type="password"
                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                       name="password_confirmation">
            </div>

            <div>
                <button type="submit"
                        name="submit_key"
                        value="rent_service_owner"
                        class="uppercase px-4 py-2 bg-blue-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-blue-400 mt-6">
                    Зарегистрировать свой сервис проката
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    computed:{
        currentRoute() {
            return window.location.pathname;
        }
    }
}
</script>

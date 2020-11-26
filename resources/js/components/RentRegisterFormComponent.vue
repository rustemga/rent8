<template>
    <div class="p-8 pt-0 text-center bg-gray-200">
        <h3 class="text-2xl font-hairline text-red-600"><i class="fas fa-file-import mr-6 shadow-lg"></i>Регистрация
            Rent</h3>

        <form method="POST" action="" class="flex">
            <div class="flex-1">
                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block">Название</label>
                    <input
                        class="border-b-2 shadow w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                        type="text"
                        name="rent_name"
                        value="" autofocus>
                </div>

                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block">Категория</label>
                    <select
                        v-model="form.category_id"
                        class="border-b-2 shadow w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                        name="category_id"
                        value="">
                        <option v-for="category in this.categories" :value="category.id">{{category.title}}</option>
                    </select>
                </div>

                <div>
                    <label class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Изображение</label>
                    <input
                        type="file"
                        name="img">
                </div>

                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block mt-6 inline-block">Опубликовать</label>

                    <input type="checkbox"
                           class="border-b-2 shadow border-red-600 rounded-lg focus:outline-none"
                           name="published">
                </div>

                <div>
                    <button type="submit"
                            name="submit_key"
                            class="uppercase px-4 py-2 bg-blue-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-blue-400 mt-6">
                        Зарегистрировать свой сервис проката
                    </button>
                </div>
            </div>

            <div class="flex-1">
                <label class="text-xl font-hairline text-gray-700 mb-2 block">Краткое описание</label>
                <div
                    class="mx-auto border-b-2 shadow px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none">
                    <vue-editor v-model="content"></vue-editor>
                </div>
                <!--                <input type="text"-->
                <!--                       class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"-->
                <!--                       name="rent_description">-->
            </div>

            <!--            <div>-->
            <!--                <label-->
            <!--                    class="text-xl font-hairline text-gray-700 mb-2 block">Категория</label>-->
            <!--                <select-->
            <!--                    class="border-b-2 shadow xl:w-1/5 lg:w-1/3 md:w-1/3 sm:w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"-->
            <!--                    name="category"-->
            <!--                    value="">-->

            <!--                </select>-->
            <!--            </div>-->

            <!--            <div>-->
            <!--                <label class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Изображение</label>-->
            <!--                <input type="file" name="img">-->
            <!--            </div>-->

            <!--            <div>-->
            <!--                <label-->
            <!--                    class="text-xl font-hairline text-gray-700 mb-2 block mt-6 inline-block">Опубликовать</label>-->

            <!--                <input type="checkbox"-->
            <!--                       class="border-b-2 shadow border-red-600 rounded-lg focus:outline-none"-->
            <!--                       name="published">-->
            <!--            </div>-->

            <!--            <div>-->
            <!--                <button type="submit"-->
            <!--                        name="submit_key"-->
            <!--                        class="uppercase px-4 py-2 bg-blue-600 rounded-lg text-gray-100 text-xl font-hairline text-uppercase hover:bg-blue-400 mt-6">-->
            <!--                    Зарегистрировать свой сервис проката-->
            <!--                </button>-->
            <!--            </div>-->
        </form>
    </div>
</template>

<script>
import {VueEditor} from "vue2-editor";

export default {
    components: {
        VueEditor
    },
    data() {
        return {
            categories: [],
            content: "<p>Введите описание ...</p>",
            form: new Form({
                rent_name: '',
                category_id: '1',
                img: '',
                published: '',
            }),
        };
    },
    mounted() {
        this.getCategories()
    },
    methods: {
        getCategories() {
            axios.get('/get-categories').then((response) => {
                this.categories = response.data
            });
        }
        },

    computed: {
            currentRoute() {
                return window.location.pathname;
            }
        }
}
</script>

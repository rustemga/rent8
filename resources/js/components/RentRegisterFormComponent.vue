<template>
    <div class="p-8 pt-0 text-center bg-gray-200">
        <h3 class="text-2xl font-hairline text-red-600"><i class="fas fa-file-import mr-6 shadow-lg"></i>Регистрация
            Rent</h3>

        <form method="POST"
              class="flex"
              enctype="multipart/form-data"
              @submit.prevent="submitRent">
            <div class="flex-1">
                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block">Название</label>
                        <span class="font-hairline text-red-400 block text-sm" role="alert"
                              v-show="form.errors.has('rent_name')">
                            <strong>{{ form.errors.get('rent_name') }}</strong>
                        </span>
                    <input
                        class="border-b-2 shadow w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                        :class="{'bg-red-200' : form.errors.has('rent_name')}"
                        type="text"
                        name="rent_name"
                        value="" autofocus
                        v-model="form.rent_name"
                        @keydown="form.errors.clear('rent_name')">

                </div>

                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block">Категория</label>
                    <span class="font-hairline text-red-400 block text-sm" role="alert"
                          v-show="form.errors.has('category_id')">
                        <strong>{{ form.errors.get('category_id') }}</strong>
                    </span>
                    <select
                        :class="{'bg-red-200' : form.errors.has('category_id')}"
                        v-model="form.category_id"
                        class="border-b-2 shadow w-1/2 px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
                        name="category_id"
                        value="">
                        <option v-for="category in this.categories" v-bind:value="category.id">{{category.title}}</option>
                    </select>

                </div>

                <div>
                    <label class="text-xl font-hairline text-gray-700 mb-2 block mt-6">Изображение</label>
                    <span class="font-hairline text-red-400 block text-sm" role="alert"
                          v-show="form.errors.has('img')">
                        <strong>{{ form.errors.get('img') }}</strong>
                    </span>
                    <input
                        type="file"
                        name="img"
                        id="img"
                        :class="{'bg-red-200' : form.errors.has('img')}">
                </div>

                <div>
                    <label
                        class="text-xl font-hairline text-gray-700 mb-2 block mt-6 inline-block">Опубликовать</label>
                    <span class="font-hairline text-red-400 block text-sm" role="alert"
                          v-show="form.errors.has('published')">
                        <strong>{{ form.errors.get('published') }}</strong>
                    </span>
                    <input type="checkbox"
                           v-model="form.published"
                           class="border-b-2 shadow border-red-600 rounded-lg focus:outline-none"
                           name="published"
                           :class="{'bg-red-200' : form.errors.has('published')}">
                    <p>{{form.published}}</p>
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
                <span class="font-hairline text-red-400 block text-sm" role="alert" v-show="form.errors.has('description')">
                    <strong>{{ form.errors.get('description') }}</strong>
                </span>
                <div class="mx-auto shadow px-4 py-2 text-gray-700 text-xl rounded-lg focus:outline-none">
                    <vue-editor
                        v-model="form.description"
                        :class="{'bg-red-200' : form.errors.has('description')}"></vue-editor>
                </div>
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
            published: '',
            form: new Form({
                rent_name: '',
                category_id: '1',
                img: '',
                description: '<p>Введите описание ...</p>',
                published: false,
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
        },
        submitRent(){
            let data = new FormData();
            if(this.form.published){
                this.published = 1;
            }else{
                this.published = 0;
            }
            data.append('rent_name', this.form.rent_name);
            data.append('category_id', this.form.category_id);
            data.append('description', this.form.description);
            data.append('published', this.published);
            if(document.getElementById('img').files[0]){data.append('img', document.getElementById('img').files[0])}

            axios.post('/rent-store', data)
                .then((response)=>{
                    console.log('Form is sending!');
                })
                .then((response)=>{
                this.form.reset();
            }).catch(error => this.form.errors.record(error.response.data));

            // axios({
            //     method: 'get',
            //     url:'/rent-store',
            //     data: data,
            // }).then((response) => {
            //     this.data = response.data
            // });
        }
        },

    computed: {
            currentRoute() {
                return window.location.pathname;
            }
        }
}
</script>

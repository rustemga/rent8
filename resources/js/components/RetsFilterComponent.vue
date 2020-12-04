<template>
    <div class="flex flex-wrap justify-center">
        <select
            v-model="filter"
            class="border-b-2 shadow px-4 py-2 border-red-600 text-gray-700 text-xl rounded-lg focus:outline-none"
        >
            <option value="all">Все категории</option>
            <option
                v-for="category_item in categories"
                v-bind:key="category_item.id"
                :value = "category_item.id">{{category_item.title}}</option>
        </select>
    </div>
</template>

<script>

export default {
        data(){
          return {
              categories: [],
              filter: 'all'
          }
        },
        mounted() {
            this.getCategories();
        },

        watch:{
            filter(value){
                this.filter = value;
                console.log(this.filter);
                this.$emit('selectedCategory', this.filter);
            }
        },

        methods: {
            getCategories(){
                axios.get('/get-categories')
                    .then((response)=> {
                        this.categories = response.data;
                    })
            },
            // selectedCategory(){
            //     this.$emit('selectedCategory', this.filter);
            // }
        },
    }
</script>

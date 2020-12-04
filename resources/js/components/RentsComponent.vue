<template>
    <div>
        <filters-rents @selectedCategory="currentCategory = $event"/>
        <div class="flex flex-wrap py-10 justify-center">
            <LoaderComponent v-if="loading"/>
            <RentsItemComponent
                v-for="rent in filteredRents"
                :key="rent.id"
                :rent="rent"/>
        </div>
        <p>currentCategory = {{currentCategory}}</p>
    </div>
</template>

<script>
import RentsItemComponent from "./RentsItemComponent";
import LoaderComponent from "./LoaderComponent";
export default {
    components: {RentsItemComponent, LoaderComponent},
    data() {
        return {
            rents: [],
            categories:[],
            loading: true,
            currentCategory:'all'
        }
    },
    mounted() {
        this.getRents();
        this.getCategories();
        this.selectedCategory();
        console.log(this.curentCategory);
    },

    methods: {
        getRents() {
            axios.get('/get-rents')
                .then((response) => {
                    setTimeout(()=>{
                        this.loading = false;
                        this.rents = response.data;
                        console.log(this.rents);
                    }, 500)});
        },
        getCategories(){
            axios.get('/get-categories')
            .then((response)=> {
                this.categories = response.data;
                console.log(this.categories);
            })
        },
        selectedCategory(id){
            this.curentCategory = this.$emit('selected-category', id);
        }
    },

    computed:{
        filteredRents(){
            if(currentCategory === 'all') {
                return this.rents;
            }
            else{
                return this.rents.filter(t => t.category_id === this.currentCategory);
            }
        }
    }
}
</script>

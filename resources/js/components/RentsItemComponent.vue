<template>
    <div
        class="bg-gray-100 rounded-lg px-4 py-6 mx-2 mb-6 flex-initial text-center xl:w-1/6 lg:w-1/5 md:w-1/4 sm:w-1/2 xs:w-1/2 hover:bg-gray-300 shadow-xl"
        v-if="rent.published">
        <div class="text-center"><i class="fas fa-bicycle"></i></div>
        <h1 class="text-xl font-bold text-gray-700">{{ rent.rent_name }}</h1>
        <p class="text-gray-500">{{ rent.rent_description }}</p>
        <p>{{rent.category_id}}</p>
        <div class="flex">
            <div class="flex-initial w-1/2 text-left font-bold text-green-500">Открыто</div>
            <div class="flex-initial w-1/2 text-right"><i class="fas fa-star text-yellow-600"></i><span>5</span></div>
        </div>
    </div>
</template>
<script>
    export default {
        props:[
            'rent'
        ]
    }
</script>

<template>
    <div>
        <RentsItemComponent></RentsItemComponent>
    </div>

</template>

<script>
import RentsItemComponent from "./RentsItemComponent";
export default {
    components: {RentsItemComponent},
    data(){
        return {
            rents:[]
        }
    },
    mounted() {
        this.getRents()
    },

    methods: {
      getRents(){
          axios.get('/get-rents').then((response) => {
              this.rents = response.data
              console.log(this.rents);
          });
        }
    }
}
</script>

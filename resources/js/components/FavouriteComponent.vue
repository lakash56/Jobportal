<template>
    <div>
       <!-- <form v-on:submit.prevent="formSubmit"> -->

           <button v-if="show"  v-on:click.prevent="unsave" class="btn btn-dark" style="width
           :100%;">Unsave</button>

            <button v-else  v-on:click.prevent="save" class="btn btn-primary" style="width
           :100%;">Save</button>
       <!-- </form> -->

    </div>
</template>

<script>
    export default {
     props:['jobid','favourited'],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':false
            }
        } ,
        mounted(){
           this.show=  this.jobFavourited ? true:false;
        },
        computed:{
            jobFavourited(){
                return this.favourited
            }
        },
         methods:{
            save(){
                axios.post('/save/'+ this.jobid).then(response=>this.show=true).catch(error=>alert('error'))
            },
            unsave(){
                 axios.post('/unsave/'+ this.jobid).then(response=>this.show=false).catch(error=>alert('error'))
            }


        }
    }
</script>

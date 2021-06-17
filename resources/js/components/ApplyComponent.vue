<template>
    <div>
       <form v-on:submit.prevent="formSubmit">

           <button v-if="show" type="submit" class="btn btn-success" style="width
           :100%;">Apply</button>

            <div v-else class="alert alert-success" style="width:100%">
                Application Sent!!
            </div>
       </form>

    </div>
</template>

<script>
    export default {
     props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                'show':true
            }
        },
         methods:{
            formSubmit(){
                axios.post('/applications/' + this.jobid,{

                }).then((response)=>{
                    this.show=false
                });
            }
        }
    }
</script>

<template>
    <div>
        <input type="text" v-model="keyword" placeholder="Search Jobs..." v-on:keyup="searchJobs"
        class="form-control" style=" border-radius: 0%;">{{results}}

        <div class="card-footer" v-if="results.lngth">
            <ul class="list-group">
                <li class="list-group-item">
                    <a :href="'/jobs/'+ result.id + '/'+ result.slug +'/' ">

                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                keyword:'',
                results: [],
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            searchJobs(){
                this.results = [];
                if(this.keyword.length>1){
                    axios.get('/jobs/search',{params:{keyword:this.keyword}}).then(
                        response=>{
                            this.results = response.data;
                        }
                    );
                }
            }
        }
    }
</script>

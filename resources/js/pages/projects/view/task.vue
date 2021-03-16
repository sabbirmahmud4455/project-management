<template lang="">
    <div>
        <div class="row">
            <div v-if="tasks.data" v-for="(task, index) in tasks.data" :key="index" class="col-6">
                <div class="card card-widget">
                <div class="card-body">
                    <h6>
                        <span>
                            <router-link :to="{name:'task_view', params:{id: task.id}}" class=" text-dark">
                            {{task.name}}
                            </router-link>
                        </span>
                    </h6>
                    <h5>
                        <span>
                            <router-link :to="{name:'task_view', params:{id: task.id}}" class=" text-dark">
                            {{task.title}}
                            </router-link>
                        </span>
                    </h5>
                    <span class=" badge badge-primary ">{{task.status}}</span>
                </div>
                <!-- /.card-body -->
                
                </div>
                <pagination :data="tasks" :limit=2 align='center'  @pagination-change-page="getTask">
                    <span slot="prev-nav">Previous <i class="fas fa-arrow-left "></i></span>
                    <span slot="next-nav"><i class="fas fa-arrow-right "></i> Next</span>
                </pagination>
            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            tasks:{},
        }
    },
    methods:{
        getTask(page){
            if (typeof page === 'undefined') {
            page = 1;
            }
            axios.get(`/api/project/task/${this.id}?page=` + page).then(response => {
                this.tasks = response.data;
            })
        },
        
    },
    mounted() {
        this.getTask();
    },
}
</script>
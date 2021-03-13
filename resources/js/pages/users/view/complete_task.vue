<template lang="">
    <div>
        <div class="row">
            <div v-if="complete_tasks.data" v-for="(task, index) in complete_tasks.data" :key="index" class="col-4">
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
                    <span class="bg-success">{{task.status}}</span>
                </div>
                <!-- /.card-body -->
                
                </div>

                <pagination :data="complete_tasks" :limit=2 align='center'  @pagination-change-page="getComplete_task">
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
            complete_tasks:{},
        }
    },
    methods:{
        getComplete_task(page){
            if (typeof page === 'undefined') {
            page = 1;
            }
            axios.get(`/api/user_complete/task/${this.id}?page=` + page).then(response => {
                this.complete_tasks = response.data;
            })
        },
        
    },
    mounted() {
        this.getComplete_task();
    },
}
</script>
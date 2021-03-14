<template lang="">
    <div>
        <div class="row">
            <div v-if="active_projects.data" v-for="(project, index) in active_projects.data" :key="index" class="col-6">
                <div class="card card-widget">
                    <div class="card-body">
                        <router-link :to="{name:'project_view', params:{id: project.id}}" class=" text-dark">
                            <img v-if="project.photo" class="img-fluid pad" :src="project.photo" alt="Photo">
                        </router-link>
                        <router-link :to="{name:'project_view', params:{id: project.id}}" class=" text-dark">
                            <h5 class="mt-3 text-dark" v-if="project.name">{{project.name}}</h5>
                        </router-link>
                    </div>
                    <!-- /.card-body -->
                </div>
                <pagination :data="active_projects" :limit=2 align='center'  @pagination-change-page="getActive_project">
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
            active_projects:{},
        }
    },
    methods:{
        getActive_project(page){
            if (typeof page === 'undefined') {
            page = 1;
            }
            axios.get(`/api/client_complete/project/${this.id}?page=` + page).then(response => {
                this.active_projects = response.data;
            })
        },
        
    },
    mounted() {
        this.getActive_project();
    },
}
</script>
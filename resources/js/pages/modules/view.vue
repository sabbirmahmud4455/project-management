<template lang="">
    <div>
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Module</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'home' }">
                                    Home
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'modules' }">
                                    Modules
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                Module Description
                            </li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5>Module Description</h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name</b> <span v-if="name" class="float-right">{{name}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Project</b>
                                 <span v-if="project_name" class="float-right">
                                     <router-link :to="{name:'project_view', params:{id: project_id}}" class=" text-primary">
                                                                                                                    {{project_name}}
                                    </router-link>
                                </span>
                            </li>

                            <br>
                            <li class="list-group-item">
                                <b class='d-block'>Description</b>
                                <div v-if="description" v-html="description"></div>
                            </li>

                        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5>Module Tasks</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <div class='col-6' v-for="(task, index) in tasks.data" :key="index">
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
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            tasks:{},

            name:'',
            title:'',
            description:'',
            project_name:'',
            project_id:'',
        }
    },
    methods:{
        getModule(){
            let id = this.$route.params.id;
            axios.get(`/api/module/${id}`)
            .then(response => {
                this.name= response.data[0].name;
                this.title= response.data[0].title;
                this.description=response.data[0].description;
                if (response.data[0].project) {
                    this.project_name= response.data[0].project.name;
                    this.project_id= response.data[0].project.id;
                }
        })
      },
      getTask(page){
            if (typeof page === 'undefined') {
            page = 1;
            }
            axios.get(`/api/module/task/${this.id}?page=` + page).then(response => {
                this.tasks = response.data;
            })
        },

    },
    mounted(){
        this.getModule();
        this.getTask();
    }
}
</script>

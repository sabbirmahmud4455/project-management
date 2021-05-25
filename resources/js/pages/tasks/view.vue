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
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        Home
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'tasks' }">
                                        Tasks
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active">
                                    Task Detailes
                                </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5>Module Description</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <ul
                                        class="list-group list-group-unbordered mb-3"
                                    >
                                        <li class="list-group-item">
                                            <b>Name :</b>
                                            <span v-if="name" class="ml-2">{{
                                                name
                                            }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Project :</b>
                                            <span
                                                v-if="project_name"
                                                class="ml-2"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'project_view',
                                                        params: {
                                                            id: project_id
                                                        }
                                                    }"
                                                    class=" text-primary"
                                                >
                                                    {{ project_name }}
                                                </router-link>
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Module :</b>
                                            <span
                                                v-if="module_name"
                                                class="ml-2"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'module_view',
                                                        params: {
                                                            id: module_id
                                                        }
                                                    }"
                                                    class=" text-primary"
                                                >
                                                    {{ module_name }}
                                                </router-link>
                                            </span>
                                        </li>

                                        <br />
                                        <li class="list-group-item">
                                            <b class="d-block">Description</b>
                                            <div
                                                v-if="description"
                                                v-html="description"
                                            ></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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
            name: "",
            title: "",
            project_name: "",
            project_id: "",
            module_name: "",
            module_id: "",
            description: ""
        };
    },
    methods: {
        getUser() {
            let id = this.$route.params.id;
            axios.get(`/api/task/${id}`).then(response => {
                this.name = response.data[0].name;
                this.title = response.data[0].title;
                this.description = response.data[0].description;
                if (response.data[0].project) {
                    this.project_name = response.data[0].project.name;
                    this.project_id = response.data[0].project.id;
                }
                if (response.data[0].module) {
                    this.module_name = response.data[0].module.name;
                    this.module_id = response.data[0].module.id;
                }
            });
        }
    },
    mounted() {
        this.getUser();
    }
};
</script>

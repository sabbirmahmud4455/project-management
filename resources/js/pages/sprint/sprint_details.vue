<template lang="">
    <div>
        <div class="content-wrapper" style="min-height: 1416.81px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Sprint Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        Home
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'sprints' }">
                                        Sprints
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active">
                                    Sprint Details
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <h3
                                        v-if="name"
                                        class="profile-username text-center"
                                    >
                                        {{ name }}
                                    </h3>

                                    <ul
                                        class="list-group list-group-unbordered mb-3"
                                    >
                                        <li class="list-group-item">
                                            <b>Type</b>
                                            <span
                                                v-if="type"
                                                class="float-right"
                                                >{{ type }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Start Date</b>
                                            <span
                                                class="float-right"
                                                v-if="start_date"
                                                >{{ start_date }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>End Date</b>
                                            <span
                                                class="float-right"
                                                v-if="end_date"
                                            >
                                                {{ end_date }}</span
                                            >
                                        </li>

                                        <li class="list-group-item">
                                            <b>Purposes</b>
                                            <span
                                                class="float-right"
                                                v-if="purposes"
                                            >
                                                {{ purposes }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b>
                                            <span
                                                class="float-right"
                                                v-if="status"
                                            >
                                                {{ status }}</span
                                            >
                                        </li>

                                        <li class="list-group-item">
                                            <b class="d-block">Description </b>
                                            <div
                                                v-if="description"
                                                v-html="description"
                                            ></div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2"></div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="project_input"
                                                        >Project</label
                                                    >
                                                    <select
                                                        class="form-control"
                                                        name=""
                                                        id="project_input"
                                                    >
                                                        <option
                                                            @click="
                                                                projectTask = null
                                                            "
                                                            :valeu="null"
                                                            >Select
                                                            Project</option
                                                        >
                                                        <option
                                                            v-for="(project,
                                                            index) in allProject"
                                                            :key="index"
                                                            @click="
                                                                getProjectTask(
                                                                    project.id
                                                                )
                                                            "
                                                            :value="project.id"
                                                            >{{
                                                                project.name
                                                            }}</option
                                                        >
                                                    </select>
                                                </div>
                                            </div>

                                            <div
                                                v-if="projectTask"
                                                class="col-12"
                                            >
                                                <h5>Task</h5>
                                            </div>

                                            <div
                                                class=" col-md-4 col"
                                                v-for="(task,
                                                index) in projectTask"
                                                :key="index"
                                            >
                                                <div class="card">
                                                    <div class="card-body">
                                                        <label for="">{{
                                                            task.name
                                                        }}</label>
                                                        <input
                                                            v-model="selectTask"
                                                            :value="task.id"
                                                            type="checkbox"
                                                            name=""
                                                            id=""
                                                        />
                                                        <!-- <h4 class="card-title">Title</h4>
                                                        <p class="card-text">Text</p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            selectTask: [],
            allProject: null,
            id: this.$route.params.id,
            projectTask: null,
            name: null,
            type: null,
            start_date: null,
            end_date: null,
            purposes: null,
            description: null,
            status: null
        };
    },
    methods: {
        getProject() {
            axios.get("/api/all_projects").then(res => {
                this.allProject = res.data;
            });
        },
        getProjectTask(id) {
            axios.get(`/api/project/task/w/${id}`).then(res => {
                this.projectTask = res.data;
                console.log(res.data);
            });
        },

        getSprint() {
            let id = this.$route.params.id;
            axios.get(`/api/sprint/${id}`).then(response => {
                this.name = response.data.name;
                this.type = response.data.type;
                this.start_date = response.data.start_date;
                this.end_date = response.data.end_date;
                this.purposes = response.data.purposes;
                this.description = response.data.description;
                this.status = response.data.status;
            });
        }
    },
    mounted() {
        this.getSprint();
        this.getProject();
    }
};
</script>
<style lang=""></style>

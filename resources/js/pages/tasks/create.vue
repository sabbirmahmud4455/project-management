<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Create Task</h1>
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
                                    Create Task
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
                            <div class="card card-primary">
                                <div class="card-header d-flex">
                                    <h3 class="card-title">Task</h3>
                                </div>
                                <!-- /.card-header -->
                                <form
                                    @submit.prevent="createTask()"
                                    @keydown="form.onKeydown($event)"
                                >
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="task_name"
                                                    >Name *</label
                                                >
                                                <input
                                                    v-model="form.name"
                                                    type="text"
                                                    name="name"
                                                    class="form-control"
                                                    placeholder="Enter Name"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'name'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="name"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="task_title"
                                                    >Title</label
                                                >
                                                <input
                                                    v-model="form.title"
                                                    type="text"
                                                    name="title"
                                                    class="form-control"
                                                    placeholder="Enter Title"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'title'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="title"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputStatus"
                                                    >Project</label
                                                >
                                                <select
                                                    v-model="form.project_id"
                                                    class="form-control custom-select"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'project_id'
                                                        )
                                                    }"
                                                >
                                                    <option
                                                        @click="getModule(0)"
                                                        value="0"
                                                        >Select Project</option
                                                    >
                                                    <option
                                                        v-if="
                                                            all_projects.length
                                                        "
                                                        v-for="(project,
                                                        index) in all_projects"
                                                        :key="index"
                                                        :value="project.id"
                                                        @click="
                                                            getModule(
                                                                form.project_id
                                                            )
                                                        "
                                                        >{{
                                                            project.name
                                                        }}</option
                                                    >
                                                </select>
                                                <has-error
                                                    :form="form"
                                                    field="project_id"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6"
                                            v-if="all_modules.length"
                                        >
                                            <div class="form-group">
                                                <label for="inputStatus"
                                                    >Module</label
                                                >
                                                <select
                                                    v-model="form.module_id"
                                                    class="form-control custom-select"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'module_id'
                                                        )
                                                    }"
                                                >
                                                    <option value="0"
                                                        >Select Module</option
                                                    >
                                                    <option
                                                        v-for="(module,
                                                        index) in all_modules"
                                                        :key="index"
                                                        :value="module.id"
                                                        >{{
                                                            module.name
                                                        }}</option
                                                    >
                                                </select>
                                                <has-error
                                                    :form="form"
                                                    field="project_id"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputStatus"
                                                    >Assign To</label
                                                >
                                                <select
                                                    v-model="form.assign_to"
                                                    class="form-control custom-select"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'assign_to'
                                                        )
                                                    }"
                                                >
                                                    <option value="0"
                                                        >Select User</option
                                                    >
                                                    <option
                                                        v-if="all_users.length"
                                                        v-for="(user,
                                                        index) in all_users"
                                                        :key="index"
                                                        :value="user.id"
                                                        >{{ user.name }}</option
                                                    >
                                                </select>
                                                <has-error
                                                    :form="form"
                                                    field="project_id"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address"
                                                    >Description</label
                                                >
                                                <vue-editor
                                                    v-model="form.description"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Create Task
                                        </button>
                                    </div>
                                </form>
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
import { Form } from "vform";
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            all_projects: [],
            all_modules: [],
            all_users: [],
            form: new Form({
                project_id: 0,
                module_id: 0,
                assign_to: 0,
                name: "",
                title: "",
                description: '<h4 class="text-muted">Task Details</h4>'
            })
        };
    },
    methods: {
        getProject() {
            axios.get("/api/all_projects").then(response => {
                this.all_projects = response.data;
            });
        },
        getModule(id) {
            axios.get(`/api/product_modules/${id}`).then(response => {
                this.all_modules = response.data;
            });
        },
        getUser() {
            axios.get("/api/all_users").then(response => {
                this.all_users = response.data;
            });
        },
        createTask() {
            this.form
                .post("/api/task")
                .then(response => {
                    this.form.name = "";
                    this.form.title = "";
                    this.form.project_id = 0;
                    this.form.module_id = 0;
                    this.form.assign_to = 0;
                    this.form.description =
                        '<h4 class="text-muted">task Details</h4>';
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "task Created Successfully"
                    });
                })
                .catch(error => {
                    if (error.response.data.errors.name) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.name[0]
                        });
                    }
                    if (error.response.data.errors.project_id) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.project_id[0]
                        });
                    }
                });
        }
    },
    mounted() {
        this.getProject();
        this.getUser();
    },
    components: {
        VueEditor
    }
};
</script>
<style lang=""></style>

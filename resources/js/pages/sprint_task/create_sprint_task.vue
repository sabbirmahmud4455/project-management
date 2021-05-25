<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Create Sprint Task</h1>
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
                                    <router-link :to="{ name: 'sprint_task' }">
                                        Sprint Tasks
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active">
                                    Create Sprint Task
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
                                    <h3 class="card-title">Sprint Task</h3>
                                </div>
                                <!-- /.card-header -->
                                <form
                                    @submit.prevent="createsprint_task()"
                                    @keydown="form.onKeydown($event)"
                                >
                                    <div class="card-body row">
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="sprint_task_name"
                                                    >Title *</label
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

                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="">Type</label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name=""
                                                    id=""
                                                >
                                                    <option :value="null"
                                                        >Select Type</option
                                                    >
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="">Sprint</label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name=""
                                                    id=""
                                                >
                                                    <option :value="null"
                                                        >Select Sprint</option
                                                    >
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="">Task</label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name=""
                                                    id=""
                                                >
                                                    <option :value="null"
                                                        >Select Task</option
                                                    >
                                                    <option>a</option>
                                                    <option>b</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="">Assigne To</label>
                                                <select
                                                    class="form-control form-control-sm"
                                                    name=""
                                                    id=""
                                                >
                                                    <option :value="null"
                                                        >Select Task</option
                                                    >
                                                    <option></option>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="">Priority</label>
                                                <input
                                                    type="text"
                                                    name=""
                                                    id=""
                                                    class="form-control"
                                                    placeholder=""
                                                    aria-describedby="helpId"
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
                                            Create Sprint Task
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

import { VueDatePicker } from "@mathieustan/vue-datepicker";
import "@mathieustan/vue-datepicker/dist/vue-datepicker.min.css";
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            form: new Form({
                name: null,
                type: null,
                duration: null,
                purposes: null,
                start_date: null,
                end_date: null,
                description: ""
            })
        };
    },
    methods: {
        createsprint_task() {
            this.form
                .post("/api/sprint_task")
                .then(response => {
                    this.form.name = null;
                    this.form.type = null;
                    this.form.start_date = null;
                    this.form.end_date = null;
                    this.form.duration = null;
                    this.form.purposes = null;
                    this.form.description = null;
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "sprint_task Created Successfully"
                    });
                })
                .catch(error => {
                    if (error.response.data.errors.name) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.name[0]
                        });
                    }
                });
        }
    },

    components: {
        VueDatePicker,
        VueEditor
    }
};
</script>

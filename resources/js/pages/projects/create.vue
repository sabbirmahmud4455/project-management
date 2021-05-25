<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Create Project</h1>
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
                                    <router-link :to="{ name: 'projects' }">
                                        Projects
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active">
                                    Create Project
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
                                    <h3 class="card-title">Project</h3>
                                </div>
                                <!-- /.card-header -->
                                <form
                                    @submit.prevent="createProject()"
                                    @keydown="form.onKeydown($event)"
                                >
                                    <div class="card-body row">
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="project_name"
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
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="inputStatus"
                                                    >Client</label
                                                >
                                                <select
                                                    v-model="form.client_id"
                                                    class="form-control custom-select"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'client_id'
                                                        )
                                                    }"
                                                >
                                                    <option value="0"
                                                        >Select Client</option
                                                    >
                                                    <option
                                                        v-if="
                                                            all_clients.length
                                                        "
                                                        v-for="(client,
                                                        index) in all_clients"
                                                        :key="index"
                                                        :value="client.id"
                                                        >{{
                                                            client.name
                                                        }}</option
                                                    >
                                                </select>
                                                <has-error
                                                    :form="form"
                                                    field="client_id"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <div class="form-control">
                                                    <VueDatePicker
                                                        v-model="
                                                            form.start_date
                                                        "
                                                        placeholder="Choose date"
                                                        clearable
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="form-control">
                                                    <VueDatePicker
                                                        v-model="form.end_date"
                                                        placeholder="Choose date"
                                                        clearable
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="project_type"
                                                    >Type</label
                                                >
                                                <input
                                                    v-model="form.type"
                                                    type="text"
                                                    name="type"
                                                    class="form-control"
                                                    id="project_type"
                                                    placeholder="Enter type"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'type'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="type"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="development_cost"
                                                    >Development Cost</label
                                                >
                                                <input
                                                    v-model="
                                                        form.development_cost
                                                    "
                                                    type="number"
                                                    name="development_cost"
                                                    class="form-control"
                                                    id="development_cost"
                                                    placeholder="Development Cost"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'development_cost'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="development_cost"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="profilePhoto"
                                                    >Photo</label
                                                >
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input
                                                            name="photo"
                                                            type="file"
                                                            class="custom-file-input"
                                                            id="profilePhoto"
                                                            @change="
                                                                onImageChange
                                                            "
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'photo'
                                                                )
                                                            }"
                                                        />
                                                        <label
                                                            class="custom-file-label"
                                                            for="profilePhoto"
                                                            >Choose file</label
                                                        >
                                                    </div>
                                                    <button
                                                        v-if="
                                                            real_time_photo.length >
                                                                0
                                                        "
                                                        @click="img_x"
                                                        class="btn btn-light"
                                                    >
                                                        <i
                                                            class="fas fa-times"
                                                        ></i>
                                                    </button>
                                                    <img
                                                        v-if="
                                                            real_time_photo.length >
                                                                0
                                                        "
                                                        style="max-width:35px; margin-left:2%; border-radius:5%;"
                                                        :src="real_time_photo"
                                                        alt="project photo"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Create Project
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
import { objectToFormData } from "object-to-formdata";

import { VueDatePicker } from "@mathieustan/vue-datepicker";
import "@mathieustan/vue-datepicker/dist/vue-datepicker.min.css";

export default {
    data() {
        return {
            real_time_photo: "",
            all_clients: [],
            form: new Form({
                client_id: 0,
                name: "",
                type: "",
                photo: "",
                start_date: null,
                end_date: null,
                development_cost: ""
            })
        };
    },
    methods: {
        img_x() {
            document.getElementById("profilePhoto").value = "";
            this.real_time_photo = "";
        },
        getClient() {
            axios.get("/api/all_clients").then(response => {
                this.all_clients = response.data;
            });
        },
        createProject() {
            this.form
                .post("/api/project", {
                    transformRequest: [
                        function(data, headers) {
                            return objectToFormData(data);
                        }
                    ],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        console.log(e);
                    }
                })
                .then(response => {
                    this.img_x();
                    this.form.client_id = 0;
                    this.form.name = "";
                    this.form.type = "";
                    this.form.start_date = null;
                    this.form.end_date = null;
                    this.form.development_cost = "";
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "project Created Successfully"
                    });
                })
                .catch(error => {
                    if (error.response.data.errors.name) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.name[0]
                        });
                    }
                    if (error.response.data.errors.photo) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.photo[0]
                        });
                    }
                });
        },

        //form img feld on chang
        onImageChange(event) {
            //object to form data
            const file = event.target.files[0];
            // Do some project side validation...
            this.form.photo = file;

            // show uploading file
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = e => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.real_time_photo = e.target.result;
                };
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    },
    mounted() {
        this.getClient();
    },
    components: {
        VueDatePicker
    }
};
</script>

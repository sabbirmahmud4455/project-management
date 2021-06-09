<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Project Update</h4>
                            <form
                                @submit.prevent="updateProject()"
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
                                    <!-- <div class="col-md-6 col">
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
                                        </div> -->
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="form-control">
                                                <VueDatePicker
                                                    v-model="form.start_date"
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
                                    <!-- <div class="col-md-6 col">
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
                                    </div> -->
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="development_cost"
                                                >Development Cost</label
                                            >
                                            <input
                                                v-model="form.development_cost"
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
                                    <div class="col-12 col-md-6">
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
                                                        @change="onImageChange"
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
                                                        class="fa fa-times"
                                                        aria-hidden="true"
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
                                                <img
                                                    v-else
                                                    style="max-width:35px; margin-left:2%; border-radius:5%;"
                                                    :src="real_photo"
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
                                        Update project
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            real_photo: "",
            // all_clients: [],
            form: new Form({
                client_id: 0,
                name: "",
                type: "",
                photo: "",
                start_date: null,
                end_date: null,
                development_cost: ""
            }),
            img: new Form({
                photo: ""
            })
        };
    },
    methods: {
        img_x() {
            document.getElementById("profilePhoto").value = "";
            this.real_time_photo = "";
        },
        // getClient() {
        //     axios.get("/api/all_clients").then(response => {
        //         this.all_clients = response.data;
        //     });
        // },
        editproject() {
            let id = this.$route.params.id;
            axios.get(`/api/project/${id}/edit`).then(response => {
                this.form.name = response.data.name;
                this.form.client_id = response.data.client_id;
                this.form.type = response.data.type;
                this.form.start_date = response.data.start_date;
                this.form.end_date = response.data.end_date;
                this.form.development_cost = response.data.development_cost;
                this.real_photo = response.data.photo;
            });
        },
        updateProject() {
            let id = this.$route.params.id;

            if (!this.img.photo == "") {
                this.img
                    .post(`/api/projects/update/${id}`, {
                        transformRequest: [
                            function(data, headers) {
                                return objectToFormData(data);
                            }
                        ]
                    })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        if (error.response.data.errors.photo) {
                            this.$toast.error({
                                title: "! ERRORS",
                                message: error.response.data.errors.photo[0]
                            });
                        }
                    });
            }
            this.form
                .put(`/api/project/${id}`)
                .then(response => {
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "project Updated Successfully"
                    });
                })
                .catch(error => {
                    if (error) {
                        if (error.response.data.errors.name) {
                            this.$toast.error({
                                title: "! ERRORS",
                                message: error.response.data.errors.name[0]
                            });
                        }
                    }
                });
        },

        //form img feld on chang
        onImageChange(event) {
            //object to form data
            const file = event.target.files[0];
            // Do some client side validation...
            this.img.photo = file;

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
        this.editproject();
        // this.getClient();
    },
    components: {
        VueDatePicker
    }
};
</script>

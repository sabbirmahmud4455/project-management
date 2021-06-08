<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">
                                User Create
                            </h4>
                            <form
                                @submit.prevent="createUser()"
                                @keydown="form.onKeydown($event)"
                            >
                                <div class="card-body row">
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="user_name"
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
                                            <label for="type">User Type</label>
                                            <multiselect
                                                type="text"
                                                v-model="form.types"
                                                tag-placeholder="Add this as new skill"
                                                placeholder="Search or add a skill"
                                                label="name"
                                                track-by="name"
                                                :options="typeOptions"
                                                :multiple="true"
                                                :taggable="true"
                                            ></multiselect>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="user_cell"
                                                >Contact Number</label
                                            >
                                            <input
                                                v-model="form.contact_no"
                                                type="text"
                                                class="form-control"
                                                id="user_cell"
                                                placeholder="Enter Contact"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'contact_no'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="contact_no"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="type">User Role</label>
                                            <multiselect
                                                type="text"
                                                v-model="form.roles"
                                                tag-placeholder="Add this as new skill"
                                                placeholder="Search or add a skill"
                                                label="name"
                                                track-by="name"
                                                :options="roleOptions"
                                                :multiple="true"
                                                :taggable="true"
                                            ></multiselect>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="user_email"
                                                >Email address *</label
                                            >
                                            <input
                                                v-model="form.email"
                                                type="email"
                                                class="form-control"
                                                id="user_email"
                                                placeholder="Enter email"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'email'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="email"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="inputStatus"
                                                >Gender</label
                                            >

                                            <div class="form-check">
                                                <label
                                                    class="form-check-label"
                                                    style="min-width:80px"
                                                >
                                                    <input
                                                        type="radio"
                                                        class="form-check-input"
                                                        value="Male"
                                                        v-model="form.gender"
                                                    />
                                                    Male
                                                </label>
                                                <label class="form-check-label">
                                                    <input
                                                        type="radio"
                                                        class="form-check-input"
                                                        value="Female"
                                                        v-model="form.gender"
                                                    />
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
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

                                                <img
                                                    v-if="
                                                        real_time_photo.length >
                                                            0
                                                    "
                                                    style="max-width:35px; margin-left:2%; border-radius:5%;"
                                                    :src="real_time_photo"
                                                    alt="user photo"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="password"
                                                >Password *</label
                                            >
                                            <input
                                                name="password"
                                                v-model="form.password"
                                                type="password"
                                                class="form-control"
                                                id="password"
                                                placeholder="Enter Password"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'password'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="password"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="confirm_password"
                                                >Confirm Password *</label
                                            >
                                            <input
                                                name="password_confirmation"
                                                v-model="
                                                    form.password_confirmation
                                                "
                                                type="password"
                                                class="form-control"
                                                id="confirm"
                                                placeholder="Confirm Password"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'password_confirmation'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="password_confirmation"
                                            ></has-error>
                                        </div>
                                    </div>
                                </div>

                                <div class="tile-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Create User
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
import Multiselect from "vue-multiselect";

export default {
    data() {
        return {
            typeOptions: [
                { name: "Backend Developer" },
                { name: "Forntend Developer" },
                { name: "Full Stack Developer" },
                { name: "UI/UX" },
                { name: "Designer" },
                { name: "QA" },
                { name: "App Developer" }
            ],

            roleOptions: [
                { name: "Admin" },
                { name: "Operator" },
                { name: "Developer" },
                { name: "Client" }
            ],

            real_time_photo: "",
            form: new Form({
                name: null,
                email: null,
                types: [],
                roles: [],
                contact_no: null,
                photo: null,
                gender: "Male",
                password: null,
                password_confirmation: null
            })
        };
    },
    methods: {
        createUser() {
            this.form
                .post("/api/user", {
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
                    this.form.name = "";
                    this.form.email = "";
                    this.form.user_type = "0";
                    this.form.contact_no = "";
                    this.form.photo = "";
                    this.form.password = "";
                    this.form.password_confirmation = "";
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "User Created Successfully"
                    });
                })
                .catch(error => {
                    if (error.response.data.errors.name) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.name[0]
                        });
                    }
                    if (error.response.data.errors.email) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.email[0]
                        });
                    }
                    if (error.response.data.errors.user_type) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.user_type[0]
                        });
                    }
                    if (error.response.data.errors.photo) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.photo[0]
                        });
                    }
                    if (error.response.data.errors.password) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.password[0]
                        });
                    }
                });
        },

        //form img feld on chang
        onImageChange(event) {
            //object to form data
            const file = event.target.files[0];
            // Do some client side validation...
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
    components: {
        Multiselect
    }
};
</script>

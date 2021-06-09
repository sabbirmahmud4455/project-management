<template>
    <div>
        <form @submit.prevent="uploadImage()" @keydown="form.onKeydown($event)">
            <div class=" row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="task_name">Name *</label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter Name"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="inputStatus">Type</label>
                                <select
                                    v-model="form.type"
                                    class="form-control custom-select"
                                    :class="{
                                        'is-invalid': form.errors.has('type')
                                    }"
                                >
                                    <option :value="null">Task Type</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Story">Story</option>
                                    <option value="Development"
                                        >Development</option
                                    >
                                    <option value="Bug">Bug</option>
                                    <option value="Update">Update</option>
                                    <option value="Change Request"
                                        >Change Request</option
                                    >
                                    <option value="Idea">Idea</option>
                                    <option value="Enhancement"
                                        >Enhancement</option
                                    >
                                    <option value="Research & Do"
                                        >Research & Do</option
                                    >
                                    <option value="Maintenance"
                                        >Maintenance</option
                                    >
                                    <option value="Quality Assurance">
                                        Quality Assurance
                                    </option>
                                    <option value="Unit Testing"
                                        >Unit Testing</option
                                    >
                                    <option value="Enhancement"
                                        >Enhancement</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="project_id"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label for="">Priority</label>
                                <div class="d-flex">
                                    <span class="mx-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input
                                                    type="radio"
                                                    class="form-check-input"
                                                    name="priority"
                                                    v-model="form.priority"
                                                    value="Low"
                                                />
                                                low
                                            </label>
                                        </div>
                                    </span>
                                    <span class="mx-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input
                                                    type="radio"
                                                    class="form-check-input"
                                                    name="priority"
                                                    v-model="form.priority"
                                                    value="Medium"
                                                />
                                                Medium
                                            </label>
                                        </div>
                                    </span>
                                    <span class="mx-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input
                                                    type="radio"
                                                    class="form-check-input"
                                                    name="priority"
                                                    v-model="form.priority"
                                                    value="High"
                                                />
                                                High
                                            </label>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="assign_to">Assign To</label>
                        <select
                            class="form-control"
                            v-model="form.assign_to"
                            id="assign_to"
                        >
                            <option :value="null">Assign</option>
                            <option
                                v-if="allUsers"
                                v-for="(user, index) in allUsers"
                                :key="index"
                                :value="user.id"
                                >{{ user.name }}</option
                            >
                        </select>
                    </div>

                    <vue-dropzone
                        v-on:vdropzone-queue-complete="createTask"
                        ref="myVueDropzone"
                        v-on:vdropzone-removed-file="removeImage"
                        v-on:vdropzone-success="uploadSuccess"
                        id="dropzone"
                        :options="dropzoneOptions"
                    ></vue-dropzone>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="address">Description</label>
                        <textarea
                            v-model="form.description"
                            placeholder="Task Description"
                            class=" form-control"
                            cols="30"
                            rows="10"
                        ></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="tile-footer">
                <button type="submit" class="btn btn-primary">
                    Create Sprint-Task
                </button>
            </div>
        </form>
    </div>
</template>
<script>
import { Form } from "vform";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    data() {
        return {
            all_projects: [],
            all_modules: null,
            allUsers: null,
            dropzoneOptions: {
                url: "/api/upload-image",
                maxFiles: 1000,
                timeout: 100000,
                maxFilesize: 100,
                addRemoveLinks: true,
                autoProcessQueue: false
            },
            form: new Form({
                sprint_id: this.$route.params.id,
                task_name: null,
                priority: null,
                status: null,
                project_id: 0,
                images: [],
                module_id: 0,
                assign_to: null,
                type: null,
                name: null,
                description: null
            })
        };
    },
    methods: {
        getUsers() {
            axios.get("/api/all_users").then(res => {
                this.allUsers = res.data;
            });
        },
        uploadSuccess: function(file, response) {
            this.form.images.push(response.imageName);
        },
        removeImage(file, error, xhr) {
            console.log(file);
        },
        getProject() {
            axios.get("/api/all_projects").then(response => {
                this.all_projects = response.data;
            });
        },
        getModule() {
            axios
                .get(`/api/product_modules/${this.form.project_id}`)
                .then(response => {
                    this.all_modules = response.data;
                });
        },
        getUser() {
            axios.get("/api/all_users").then(response => {
                this.all_users = response.data;
            });
        },
        uploadImage() {
            if (!this.form.name) {
                this.$toast.error({
                    title: "! ERRORS",
                    message: "Task name is required"
                });
                return;
            }
            if (this.$refs.myVueDropzone.getQueuedFiles().length > 0) {
                this.$refs.myVueDropzone.processQueue();
            } else {
                this.createTask();
            }
        },
        createTask() {
            this.form
                .post("/api/task")
                .then(response => {
                    this.form.name = "";
                    this.form.project_id = 0;
                    this.form.module_id = 0;
                    this.form.assign_to = 0;
                    this.form.description =
                        '<h4 class="text-muted">task Details</h4>';
                    this.$router.push({
                        name: "sprint_details",
                        params: { id: this.$route.params.id }
                    });
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
        this.getUsers();
    },
    components: {
        vueDropzone: vue2Dropzone
    }
};
</script>
<style lang=""></style>

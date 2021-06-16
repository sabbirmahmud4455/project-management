<template>
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Task Create</h4>
                            <form
                                @submit.prevent="uploadImage()"
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
                                    <!--
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus"
                                                >Project</label
                                            >
                                            <select
                                                v-model="form.project_id"
                                                @change="getModule()"
                                                class="form-control custom-select"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'project_id'
                                                    )
                                                }"
                                            >
                                                <option
                                                    @click="
                                                        (all_modules = null),
                                                            (form.module_id = 0)
                                                    "
                                                    :value="null"
                                                >
                                                    Select Project
                                                </option>
                                                <option
                                                    v-if="all_projects.length"
                                                    v-for="(project,
                                                    index) in all_projects"
                                                    :key="index"
                                                    :value="project.id"
                                                >
                                                    {{ project.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="project_id"
                                            ></has-error>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Module</label>
                                            <input
                                                v-model="module.name"
                                                type="text"
                                                class="form-control"
                                                placeholder=""
                                                disabled
                                            />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus"
                                                >Type</label
                                            >
                                            <select
                                                v-model="form.type"
                                                class="form-control custom-select"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'type'
                                                    )
                                                }"
                                            >
                                                <option :value="null"
                                                    >Task Type</option
                                                >
                                                <option value="Epic"
                                                    >Epic</option
                                                >
                                                <option value="Story"
                                                    >Story</option
                                                >
                                                <option value="Development"
                                                    >Development</option
                                                >
                                                <option value="Bug">Bug</option>
                                                <option value="Update"
                                                    >Update</option
                                                >
                                                <option value="Change Request"
                                                    >Change Request</option
                                                >
                                                <option value="Idea"
                                                    >Idea</option
                                                >
                                                <option value="Enhancement"
                                                    >Enhancement</option
                                                >
                                                <option value="Research & Do"
                                                    >Research & Do</option
                                                >
                                                <option value="Maintenance"
                                                    >Maintenance</option
                                                >
                                                <option
                                                    value="Quality Assurance"
                                                >
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputStatus"
                                                >Status</label
                                            >
                                            <select
                                                v-model="form.status"
                                                class="form-control custom-select"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'status'
                                                    )
                                                }"
                                            >
                                                <option :value="null"
                                                    >Task Status</option
                                                >

                                                <option value="TO_DO"
                                                    >To do</option
                                                >
                                                <option value="DOING"
                                                    >Doing</option
                                                >
                                                <option value="IN_TEST"
                                                    >In Test</option
                                                >
                                                <option value="DONE"
                                                    >Done</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="project_id"
                                            ></has-error>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <vue-dropzone
                                            v-on:vdropzone-queue-complete="
                                                createTask
                                            "
                                            ref="myVueDropzone"
                                            v-on:vdropzone-removed-file="
                                                removeImage
                                            "
                                            v-on:vdropzone-success="
                                                uploadSuccess
                                            "
                                            id="dropzone"
                                            :options="dropzoneOptions"
                                        ></vue-dropzone>
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

                                <div class="tile-footer">
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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Form } from "vform";
import { VueEditor } from "vue2-editor";
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    data() {
        return {
            module: null,
            dropzoneOptions: {
                url: "/api/upload-image",
                maxFiles: 1000,
                timeout: 100000,
                maxFilesize: 100,
                addRemoveLinks: true,
                autoProcessQueue: false
            },
            form: new Form({
                project_id: null,
                images: [],
                module_id: this.$route.params.id,
                assign_to: 0,
                type: null,
                name: "",
                status: null,
                description: '<h4 class="text-muted">Task Details</h4>'
            })
        };
    },
    methods: {
        uploadSuccess: function(file, response) {
            this.form.images.push(response.imageName);
        },
        removeImage(file, error, xhr) {
            console.log(file);
        },

        getModule() {
            axios.get(`/api/module/${this.$route.params.id}`).then(response => {
                this.module = response.data;
                this.form.project_id = response.data.project_id;
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
                    this.$router.push({
                        name: "project_view",
                        params: {
                            id: this.form.project_id
                        }
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
                            message: "The project field is required."
                        });
                    }
                });
        }
    },
    mounted() {
        this.getModule();
    },
    components: {
        VueEditor,
        vueDropzone: vue2Dropzone
    }
};
</script>
<style lang=""></style>

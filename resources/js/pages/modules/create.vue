<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Module Create</h4>
                            <form
                                @submit.prevent="createModule()"
                                @keydown="form.onKeydown($event)"
                            >
                                <div class="card-body row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="module_name"
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
                                            <label for="status">Status</label>
                                            <select
                                                class="form-control"
                                                name=""
                                                id="status"
                                                v-model="form.status"
                                            >
                                                <option value="Active"
                                                    >Active</option
                                                >
                                                <option value="Complete"
                                                    >Complete</option
                                                >
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Project</label>
                                            <input
                                                type="text"
                                                disabled
                                                v-model="project.name"
                                                class="form-control"
                                                placeholder=""
                                            />
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

                                <div class="tile-footer">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Create Module
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

export default {
    data() {
        return {
            project: [],
            projectId: this.$route.params.id,
            form: new Form({
                name: "",
                status: "Active",
                project_id: this.$route.params.id,
                description: '<h4 class="text-muted">Module Details</h4>'
            })
        };
    },
    methods: {
        getProject() {
            axios.get(`/api/project/${this.projectId}`).then(response => {
                this.project = response.data;
            });
        },
        createModule() {
            this.form
                .post("/api/module")
                .then(response => {
                    this.$router.push({
                        name: "project_view",
                        params: {
                            id: this.projectId
                        }
                    });
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "Module Created Successfully"
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
    },
    components: {
        VueEditor
    }
};
</script>

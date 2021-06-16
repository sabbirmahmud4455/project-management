<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Module Update</h4>
                            <form
                                @submit.prevent="updateModule()"
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
                                            <label for="">Project</label>
                                            <input
                                                type="text"
                                                disabled
                                                v-model="project.name"
                                                class="form-control"
                                                placeholder=""
                                                ds
                                            />
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
                                        Update Module
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
            form: new Form({
                name: "",
                status: null,
                description: '<h4 class="text-muted">Module Details</h4>'
            })
        };
    },
    methods: {
        getProject() {
            axios.get("/api/all_projects").then(response => {
                this.all_projects = response.data;
            });
        },
        editModule() {
            let id = this.$route.params.id;
            axios.get(`/api/module/${id}/edit`).then(response => {
                this.form.name = response.data.name;
                this.project = response.data.project;
                this.form.status = response.data.status;
                this.form.description = response.data.description;
            });
        },
        updateModule() {
            let id = this.$route.params.id;
            this.form
                .put(`/api/module/${id}`)
                .then(response => {
                    this.$router.push({
                        name: "project_view",
                        params: {
                            id: this.project.id
                        }
                    });
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "Module Updated Successfully"
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
        this.editModule();
        this.getProject();
    },
    components: {
        VueEditor
    }
};
</script>

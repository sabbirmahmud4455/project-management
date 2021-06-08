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

                                    <div class="col-12">
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
                                                <option value="0"
                                                    >Select Project</option
                                                >
                                                <option
                                                    v-if="all_projects.length"
                                                    v-for="(project,
                                                    index) in all_projects"
                                                    :key="index"
                                                    :value="project.id"
                                                    >{{ project.name }}</option
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
            all_projects: [],
            form: new Form({
                name: "",
                project_id: 0,
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
                this.form.project_id = response.data.project_id;
                this.form.description = response.data.description;
            });
        },
        updateModule() {
            let id = this.$route.params.id;
            this.form
                .put(`/api/module/${id}`)
                .then(response => {
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

<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Task Update</h4>
                            <form
                                @submit.prevent="updateTask()"
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
                                            <label for="modules">Module</label>
                                            <input
                                                v-model="module.name"
                                                type="text"
                                                name=""
                                                id="modules"
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
                                        Update Task
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
            module: [],
            project_id: null,
            form: new Form({
                type: null,
                status: null,
                name: "",
                description: '<h4 class="text-muted">Task Details</h4>'
            })
        };
    },
    methods: {
        editTask() {
            let id = this.$route.params.id;
            axios.get(`/api/task/${id}/edit`).then(response => {
                this.form.name = response.data.name;
                this.form.module_id = response.data.module_id;
                this.form.type = response.data.type;
                this.form.status = response.data.status;
                this.project_id = response.data.project_id;
                this.module = response.data.module;
                this.form.description = response.data.description;
                // console.log(response.data.module[0]);
            });
        },
        updateTask() {
            this.form
                .put(`/api/task/${this.$route.params.id}`)
                .then(response => {
                    this.$router.push({
                        name: "project_view",
                        params: {
                            id: this.project_id
                        }
                    });
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "task Updated Successfully"
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
        this.editTask();
    },
    components: {
        VueEditor
    }
};
</script>
<style lang=""></style>

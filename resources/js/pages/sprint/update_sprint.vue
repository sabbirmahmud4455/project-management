<template>
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Sprint Update</h4>
                            <form
                                @submit.prevent="UpdateSprint()"
                                @keydown="form.onKeydown($event)"
                            >
                                <div class="card-body row">
                                    <div class="col-md-6 col">
                                        <div class="form-group">
                                            <label for="Sprint_name"
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
                                            <label for="Sprint_type"
                                                >Type</label
                                            >
                                            <input
                                                v-model="form.type"
                                                type="text"
                                                name="type"
                                                class="form-control"
                                                id="Sprint_type"
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
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Duration</label>
                                            <input
                                                v-model="form.duration"
                                                type="text"
                                                name=""
                                                id=""
                                                class="form-control"
                                                placeholder="Duration"
                                                aria-describedby="helpId"
                                            />
                                        </div>
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Purposes</label>
                                            <input
                                                v-model="form.purposes"
                                                type="text"
                                                class="form-control"
                                                placeholder="Purposes"
                                                aria-describedby="helpId"
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Description</label>
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
                                        Update Sprint
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

import { VueDatePicker } from "@mathieustan/vue-datepicker";
import "@mathieustan/vue-datepicker/dist/vue-datepicker.min.css";
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            sprintID: this.$route.params.id,
            form: new Form({
                name: null,
                type: null,
                duration: null,
                purposes: null,
                status: null,
                start_date: null,
                end_date: null,
                description: ""
            })
        };
    },
    methods: {
        editSprint() {
            axios.get(`/api/sprint/${this.sprintID}/edit`).then(res => {
                this.form.name = res.data.name;
                this.form.type = res.data.type;
                this.form.start_date = res.data.start_date;
                this.form.end_date = res.data.end_date;
                this.form.duration = res.data.duration;
                this.form.status = res.data.status;
                this.form.purposes = res.data.purposes;
                this.form.description = res.data.description;
            });
        },

        UpdateSprint() {
            this.form
                .put(`/api/sprint/${this.sprintID}`)
                .then(response => {
                    this.$router.push({ name: "sprints" });
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "Sprint Updated Successfully"
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
    },
    mounted() {
        this.editSprint();
    }
};
</script>

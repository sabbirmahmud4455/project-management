<template>
    <div>
        <div class="row" style="margin:0px -30px; background: ;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body ">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="details_col">
                                    <h4 class="title">
                                        Sprint Info
                                    </h4>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            name
                                        </p>
                                        <p class="value" v-if="name">
                                            {{ name }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Type
                                        </p>
                                        <p class="value" v-if="name">
                                            {{ type }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Start Date
                                        </p>
                                        <p class="value" v-if="start_date">
                                            {{ start_date }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            End Date
                                        </p>
                                        <p class="value" v-if="end_date">
                                            {{ end_date }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Purpose
                                        </p>
                                        <p class="value" v-if="purposes">
                                            {{ purposes }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Status
                                        </p>
                                        <p class="value" v-if="status">
                                            {{ status }}
                                        </p>
                                        <p class="value" v-else>N/A</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Description
                                        </p>
                                        <p
                                            class="value"
                                            v-if="description"
                                            v-html="description"
                                        ></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 " style="padding-left:5px ">
                                <div class="details_col">
                                    <div class=" d-flex title">
                                        <h4 class="title-heading">
                                            Sprint Tasks
                                        </h4>
                                        <router-link
                                            :to="{
                                                name: 'sprint_task',
                                                params: { id: sprintID }
                                            }"
                                            class="btn-add-task ml-auto"
                                            style="background-color: #547FF3; border:none;"
                                        >
                                            <i class="ri-add-line"></i>
                                            Add Task
                                        </router-link>
                                    </div>

                                    <div
                                        class="info_propraty"
                                        style="overflow: auto"
                                    >
                                        <table class="table" id="sampleTable">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Priority</th>
                                                    <th>Assign To</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(sprint_task,
                                                    index) in sprintTasks"
                                                    :key="index"
                                                >
                                                    <td>{{ index + 1 }}</td>
                                                    <td>
                                                        <span
                                                            v-if="
                                                                sprint_task.task
                                                                    .name
                                                            "
                                                            >{{
                                                                sprint_task.task
                                                                    .name
                                                            }}</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <span
                                                            v-if="
                                                                sprint_task.priority
                                                            "
                                                            >{{
                                                                sprint_task.priority
                                                            }}</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <span
                                                            v-if="
                                                                sprint_task.user
                                                            "
                                                            >{{
                                                                sprint_task.user
                                                                    .name
                                                            }}</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <span
                                                            v-if="
                                                                sprint_task.status
                                                            "
                                                            >{{
                                                                sprint_task.status
                                                            }}</span
                                                        >
                                                    </td>
                                                    <td>
                                                        <router-link
                                                            :to="{
                                                                name:
                                                                    'sprint_task_edit',
                                                                params: {
                                                                    id:
                                                                        sprint_task.id
                                                                }
                                                            }"
                                                            class="btn btn-link px-1"
                                                        >
                                                            <i
                                                                class=" text-secondary fa fa-pencil"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </router-link>

                                                        <button
                                                            class="btn btn-link px-1"
                                                            href="#delete_modal"
                                                            data-toggle="modal"
                                                            @click="
                                                                (delete_data.id =
                                                                    sprint_task.id),
                                                                    (delete_data.index = index)
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-trash text-danger"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="edit_sprint_task"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="task_name">Task Name</label>
                                        <input
                                            type="text"
                                            name=""
                                            v-model="sprint_task_edit.task_name"
                                            id="task_name"
                                            class="form-control"
                                            placeholder="Enter Task Name"
                                            aria-describedby="helpId"
                                        />
                                        <small id="helpId" class="text-muted"
                                            >Help text</small
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 col"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="createTaskWithSprint()"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete Modal HTML -->

        <dataDeleteModal
            :id="delete_data.id"
            :index="delete_data.index"
            :deleteFunction="delete_sprint_task"
        ></dataDeleteModal>
    </div>
</template>
<script>
import dataDeleteModal from "../../inc/delete_modal.vue";

export default {
    data() {
        return {
            delete_data: {
                id: null,
                index: null
            },
            tasks: [],
            sprintID: this.$route.params.id,

            sprint_task_edit: {
                task_name: null,
                id: null,
                priority: null,
                assign_to: null,
                status: null
            },

            allUsers: null,
            allProject: null,
            sprintTasks: null,

            name: null,
            type: null,
            start_date: null,
            end_date: null,
            purposes: null,
            description: null,
            status: null
        };
    },
    methods: {
        edit_sprint_task(id) {
            axios.get(`/api/sprint/sprint-task/${id}/edit`).then(res => {
                $("#edit_sprint_task").modal("show");
                this.sprint_task_edit.id = res.data.id;
                this.sprint_task_edit.priority = res.data.priority;
                this.sprint_task_edit.assign_to = res.data.assign_to;
                this.sprint_task_edit.status = res.data.status;
                // this.sprint_task_edit.task_name = res.data.task.name;
            });
        },
        updateSprintTask() {
            axios
                .put(
                    `/api/sprint/sprint-task/${this.sprint_task_edit.id}`,
                    this.sprint_task_edit
                )
                .then(res => {
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "Sprint-Task Updated Successfully"
                    });
                    this.getSprint();
                });
        },
        delete_sprint_task(id, index) {
            console.log(id);
            axios.delete(`/api/sprint/sprint-task/${id}`).then(res => {
                $("#delete_modal").modal("hide");
                this.sprintTasks.splice(index, 1);
                this.$toast.success({
                    title: "SUCCESS",
                    message: "Sprint-Task Delete Successfully"
                });
            });
        },
        getUsers() {
            axios.get("/api/user").then(res => {
                this.allUsers = res.data;
            });
        },
        getSprint() {
            axios.get(`/api/sprint/${this.sprintID}`).then(response => {
                this.name = response.data.name;
                this.type = response.data.type;
                this.start_date = response.data.start_date;
                this.end_date = response.data.end_date;
                this.purposes = response.data.purposes;
                this.description = response.data.description;
                this.status = response.data.status;
                if (response.data.sprint_task) {
                    this.sprintTasks = response.data.sprint_task;
                }
            });
        }
    },
    mounted() {
        this.getSprint();
        this.getUsers();
    },
    components: {
        dataDeleteModal
    }
};
</script>
<style lang=""></style>

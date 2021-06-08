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
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Type
                                        </p>
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Start Date
                                        </p>
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            End Date
                                        </p>
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Purpose
                                        </p>
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Status
                                        </p>
                                        <p class="value">ajsdfjldsj</p>
                                    </div>
                                    <div class="info_propraty">
                                        <hp class="propraty_title">
                                            Description
                                        </hp>
                                        <p class="value">
                                            Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit.
                                            Perspiciatis suscipit accusantium
                                            fugit, natus quos rem quae.
                                            Recusandae ad esse voluptas magni
                                            officia adipisci, mollitia molestiae
                                            possimus corrupti debitis
                                            consectetur ratione.
                                        </p>
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

                                    <div class="info_propraty">
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>
                                                        <button
                                                            class="btn btn-link px-1"
                                                        >
                                                            <i
                                                                class="fa fa-pencil text-secondary"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-link px-1"
                                                        >
                                                            <i
                                                                class="fa fa-trash text-danger"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>
                                                        <button
                                                            class="btn btn-link px-1"
                                                        >
                                                            <i
                                                                class="fa fa-pencil text-secondary"
                                                                aria-hidden="true"
                                                            ></i>
                                                        </button>
                                                        <button
                                                            class="btn btn-link px-1"
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
    </div>
</template>
<script>
export default {
    data() {
        return {
            tasks: [],
            sprintID: this.$route.params.id,

            sprint_task_edit: {
                id: null,
                priority: null,
                assigned_to: null,
                status: null
            },

            allUsers: null,
            allProject: null,
            SprintTask: null,
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
                this.sprint_task_edit.assigned_to = res.data.assigned_to;
                this.sprint_task_edit.status = res.data.status;
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
                this.SprintTask.splice(index, 1);
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
                if (response.data.sprint_task.length) {
                    this.SprintTask = response.data.sprint_task;
                }
            });
        }
    },
    mounted() {
        this.getSprint();
        this.getUsers();
    }
};
</script>
<style lang=""></style>

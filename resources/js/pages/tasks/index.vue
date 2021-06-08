<template>
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12  px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Tasks</h4>
                            <router-link
                                :to="{
                                    name: 'task_create'
                                }"
                                class="btn btn-outline-success"
                                style="float:right"
                            >
                                Create New
                            </router-link>
                            <table
                                class="table table-hover table-bordered"
                                id="sampleTable"
                            >
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Project</th>
                                        <th>Module</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="all_tasks"
                                        v-for="(task, index) in all_tasks"
                                        :key="index"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ task.name }}</td>
                                        <td>
                                            {{
                                                task.project
                                                    ? task.project.name
                                                    : "N/A"
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                task.module
                                                    ? task.module.name
                                                    : "N/A"
                                            }}
                                        </td>
                                        <td>{{ task.type }}</td>
                                        <td><span> </span></td>
                                        <!-- <td v-html="[`<span class='badge badge-danger'>In Active</span>`,`<span class='badge badge-success'>Active</span>`][task.status]"></td> -->
                                        <td>
                                            <router-link
                                                :to="{
                                                    name: 'task_view',
                                                    params: { id: task.id }
                                                }"
                                                class="btn btn-link px-1"
                                            >
                                                <i
                                                    class=" text-primary fa fa-eye"
                                                    aria-hidden="true"
                                                ></i>
                                            </router-link>
                                            <router-link
                                                :to="{
                                                    name: 'task_update',
                                                    params: { id: task.id }
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
                                                    (delete_data.id = task.id),
                                                        (delete_data.index = index)
                                                "
                                            >
                                                <i
                                                    class=" text-danger fa fa-trash"
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

        <!-- delete Modal HTML -->
        <dataDeleteModal
            :id="delete_data.id"
            :index="delete_data.index"
            :deleteFunction="taskDelete"
        ></dataDeleteModal>
    </div>
</template>
<script>
import dataDeleteModal from "../../inc/delete_modal";
export default {
    data() {
        return {
            all_tasks: null,
            delete_data: {
                id: null,
                index: null
            }
        };
    },
    methods: {
        getTask() {
            axios.get("/api/task").then(response => {
                this.all_tasks = response.data;
                setTimeout(function() {
                    window.loadDataTable();
                }, 1000);
            });
        },
        taskDelete(id, index) {
            axios.delete(`/api/task/${id}`).then(res => {
                $("#delete_modal").modal("hide");
                this.all_tasks.splice(index, 1);
                this.$toast.success({
                    title: "SUCCESS",
                    message: res.data
                });
            });
        }
    },
    mounted() {
        this.getTask();
    },
    components: {
        dataDeleteModal
    }
};
</script>

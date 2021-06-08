<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
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
                                                name: 'user_profile',
                                                params: { id: task.id }
                                            }"
                                            class="btn btn-info btn-sm"
                                        >
                                            <i class="fas fa-folder"> </i>
                                            View
                                        </router-link>
                                        <router-link
                                            :to="{
                                                name: 'user_update',
                                                params: { id: task.id }
                                            }"
                                            class="btn btn-info btn-sm"
                                        >
                                            <i class="fas fa-pencil-alt"> </i>
                                            Edit
                                        </router-link>
                                        <!-- <button
                                    class="btn btn-danger btn-sm"
                                    href="#delete_modal"
                                    data-toggle="modal"
                                    @click="
                                        (delete_data.id = task.id),
                                            (delete_data.index = index)
                                    "
                                >
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete Modal HTML -->
        <!-- <dataDeleteModal :id="delete_data.id" :index="delete_data.index" :deleteFunction="taskDelete"></dataDeleteModal> -->
    </div>
</template>
<script>
// import dataDeleteModal from '../../inc/delete_modal'
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
            axios.get("/sanctum/csrf-cookie").then(response => {
                axios.get("/api/my-task").then(response => {
                    this.all_tasks = response.data;
                    setTimeout(function() {
                        window.loadDataTable();
                    }, 1000);
                });
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
        // dataDeleteModal
    }
};
</script>

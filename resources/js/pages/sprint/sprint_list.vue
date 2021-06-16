<template>
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Sprints</h4>


                            <div style="overflow: auto">
                                 <router-link
                                :to="{
                                    name: 'sprint_create'
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
                                            <th>Type</th>
                                            <th>start_date</th>
                                            <th>end_date</th>
                                            <th>status</th>
                                            <th>purposes</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-if="all_sprints"
                                            v-for="(sprint,
                                            index) in all_sprints"
                                            :key="index"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ sprint.name }}</td>
                                            <td>{{ sprint.type }}</td>
                                            <td>{{ sprint.start_date }}</td>
                                            <td>{{ sprint.end_date }}</td>
                                            <td>{{ sprint.status }}</td>
                                            <td>{{ sprint.purposes }}</td>
                                            <!-- <td>  {{sprint.project?sprint.project.name:"N/A"}}</td>
                    <td>{{sprint.module?sprint.module.name:"N/A"}}</td>
                    <td>{{sprint.type}}</td>
                    <td><span>

                        </span>
                    </td> -->
                                            <!-- <td v-html="[`<span class='badge badge-danger'>In Active</span>`,`<span class='badge badge-success'>Active</span>`][task.status]"></td> -->
                                            <td>
                                                <router-link
                                                    :to="{
                                                        name: 'sprint_details',
                                                        params: {
                                                            id: sprint.id
                                                        }
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
                                                        name: 'sprint_update',
                                                        params: {
                                                            id: sprint.id
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
                                                            sprint.id),
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
        </div>

        <!-- delete Modal HTML -->

        <dataDeleteModal
            :id="delete_data.id"
            :index="delete_data.index"
            :deleteFunction="sprintDelete"
        ></dataDeleteModal>
    </div>
</template>
<script>
import dataDeleteModal from "../../inc/delete_modal";
export default {
    data() {
        return {
            all_sprints: null,
            delete_data: {
                id: null,
                index: null
            }
        };
    },
    methods: {
        getSprint() {
            axios.get("/api/sprint").then(response => {
                this.all_sprints = response.data;
                setTimeout(function() {
                    window.loadDataTable();
                }, 1000);
            });
        },
        sprintDelete(id, index) {
            axios.delete(`/api/sprint/${id}`).then(res => {
                $("#delete_modal").modal("hide");
                this.all_sprints.splice(index, 1);

                this.$toast.success({
                    title: "SUCCESS",
                    message: "Sprint Deleted Successfully"
                });
            });
        }
    },
    mounted() {
        this.getSprint();
    },
    components: {
        dataDeleteModal
    }
};
</script>

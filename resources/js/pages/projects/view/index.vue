<template lang="">
    <div>
        <div class="row " style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="details_col">
                                    <h4 class="title">Project Update</h4>
                                    <div class="">
                                        <div class="text-center mb-3">
                                            <img
                                                v-if="photo.length"
                                                class="img-fluid"
                                                :src="photo"
                                                alt="Project main picture"
                                            />
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="name.length"
                                                class="propraty_title"
                                            >
                                                name
                                            </p>
                                            <p class="value">
                                                {{ name }}
                                            </p>
                                        </div>

                                        <!-- <div class="info_propraty">
                                            <p
                                                v-if="type.length"
                                                class="propraty_title"
                                            >
                                                Type
                                            </p>
                                            <p class="value">
                                                {{ type }}
                                            </p>
                                        </div> -->

                                        <div class="info_propraty">
                                            <p
                                                v-if="start_date"
                                                class="propraty_title"
                                            >
                                                Start Date
                                            </p>
                                            <p class="value">
                                                {{ start_date }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="end_date"
                                                class="propraty_title"
                                            >
                                                End Date
                                            </p>
                                            <p class="value">
                                                {{ end_date }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="development_cost"
                                                class="propraty_title"
                                            >
                                                Development Cost
                                            </p>
                                            <p class="value">
                                                {{ development_cost }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" style="padding-left: 5px;">
                                <div class="details_col">
                                    <h4 class="title">Project Modules</h4>
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li
                                                    class="nav-item mb-2"
                                                    v-for="(module,
                                                    index) in projectModueles"
                                                    :key="index"
                                                >
                                                    <button
                                                        @click="
                                                            moduleTask(
                                                                module.id
                                                            )
                                                        "
                                                        class="btn mx-1"
                                                    >
                                                        {{ module.name }}
                                                    </button>
                                                </li>
                                                <li>
                                                    <router-link
                                                        :to="{
                                                            name:
                                                                'module_create',
                                                            params: {
                                                                id: id
                                                            }
                                                        }"
                                                        class="btn btn-primary"
                                                    >
                                                        +
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="module_descripton">
                                                <div>
                                                    <div class="d-flex">
                                                        <h5
                                                            class=""
                                                            style="ont-size: 16px !important;
font-weight: 500; color: #757575;"
                                                        >
                                                            Module Description
                                                        </h5>
                                                        <router-link
                                                            v-if="
                                                                selectedModuleId
                                                            "
                                                            :to="{
                                                                name:
                                                                    'module_update',
                                                                params: {
                                                                    id: selectedModuleId
                                                                }
                                                            }"
                                                            class="btn btn-secondary ml-auto"
                                                        >
                                                            <i
                                                                class="fa fa-pencil"
                                                                aria-hidden="true"
                                                            ></i>
                                                            Edit Module
                                                        </router-link>
                                                    </div>

                                                    <div
                                                        v-if="
                                                            module.description
                                                        "
                                                        v-html="
                                                            module.description
                                                        "
                                                        class="mb-4"
                                                        style="color: #757575;"
                                                    ></div>
                                                </div>
                                                <hr />

                                                <h5
                                                    style="ont-size: 16px !important;
font-weight: 500; color: #757575;"
                                                >
                                                    Module Task List
                                                </h5>

                                                <div style="overflow: auto">
                                                    <router-link
                                                        v-if="selectedModuleId"
                                                        :to="{
                                                            name: 'task_create',
                                                            params: {
                                                                id: selectedModuleId
                                                            }
                                                        }"
                                                        class="btn btn-outline-success"
                                                        style="float:right"
                                                    >
                                                        Create Task
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
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr
                                                                v-if="
                                                                    moduleTasks
                                                                "
                                                                v-for="(task,
                                                                index) in moduleTasks"
                                                                :key="index"
                                                            >
                                                                <td>
                                                                    {{
                                                                        index +
                                                                            1
                                                                    }}
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        v-if="
                                                                            task.name
                                                                        "
                                                                    >
                                                                        {{
                                                                            task.name
                                                                        }}
                                                                    </span>
                                                                    <span v-else
                                                                        >N/A</span
                                                                    >
                                                                </td>

                                                                <td>
                                                                    <span
                                                                        v-if="
                                                                            task.type
                                                                        "
                                                                    >
                                                                        {{
                                                                            task.type
                                                                        }}
                                                                    </span>
                                                                    <span v-else
                                                                        >N/A</span
                                                                    >
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        v-if="
                                                                            task.status
                                                                        "
                                                                        style="text-transform: capitalize;"
                                                                        >{{
                                                                            task.status.replace(
                                                                                "_",
                                                                                " "
                                                                            )
                                                                        }}</span
                                                                    >
                                                                    <span v-else
                                                                        >N/A</span
                                                                    >
                                                                </td>
                                                                <!-- <td v-html="[`<span class='badge badge-danger'>In Active</span>`,`<span class='badge badge-success'>Active</span>`][task.status]"></td> -->
                                                                <td>
                                                                    <router-link
                                                                        :to="{
                                                                            name:
                                                                                'task_view',
                                                                            params: {
                                                                                id:
                                                                                    task.id
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
                                                                            name:
                                                                                'task_update',
                                                                            params: {
                                                                                id:
                                                                                    task.id
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
                                                                                task.id),
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
                                        <!-- /.card-body -->
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
                    :deleteFunction="taskDelete"
                ></dataDeleteModal>
            </div>
        </div>
    </div>
</template>
<script>
import dataDeleteModal from "../../../inc/delete_modal.vue";
export default {
    data() {
        return {
            delete_data: {
                id: null,
                index: null
            },
            id: this.$route.params.id,
            selectedModuleId: null,
            client_id: 0,
            name: "",
            type: "",
            photo: "",
            start_date: null,
            end_date: null,
            development_cost: "",

            projectModueles: [],
            module: [],
            moduleTasks: []
        };
    },
    methods: {
        getProject() {
            let id = this.$route.params.id;
            axios.get(`/api/project/${id}`).then(response => {
                this.name = response.data.name;
                this.client_id = response.data.client_id;
                this.type = response.data.type;
                this.start_date = response.data.start_date;
                this.end_date = response.data.end_date;
                this.development_cost = response.data.development_cost;
                this.photo = response.data.photo;
                this.projectModueles = response.data.modules;
            });
        },
        moduleTask(id) {
            this.selectedModuleId = id;
            this.module = this.projectModueles.find(x => x.id === id);
            this.moduleTasks = this.projectModueles.filter(
                module => module.id == id
            )[0].tasks;
            axios;
        },
        taskDelete(id, index) {
            axios.delete(`/api/task/${id}`).then(res => {
                $("#delete_modal").modal("hide");
                this.moduleTasks.splice(index, 1);
                this.$toast.success({
                    title: "SUCCESS",
                    message: res.data
                });
            });
        }
    },
    mounted() {
        this.getProject();
    },
    components: {
        dataDeleteModal
    }
};
</script>
<style lang=""></style>

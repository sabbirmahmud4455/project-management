<template lang="">
    <div>
        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Modules</h4>
                            <router-link
                                :to="{
                                    name: 'module_create'
                                }"
                                style="float:right"
                                class="btn btn-outline-success"
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
                                        <th>title</th>
                                        <th>project</th>
                                        <th>status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-if="all_modules"
                                        v-for="(modul, index) in all_modules"
                                        :key="index"
                                    >
                                        <td>{{ modul.name }}</td>
                                        <td>{{ modul.name }}</td>
                                        <td>{{ modul.title }}</td>
                                        <td>
                                            <span>
                                                {{
                                                    modul.project
                                                        ? modul.project.name
                                                        : "N/A"
                                                }}
                                            </span>
                                        </td>
                                        <td
                                            v-html="
                                                [
                                                    `<span class='badge badge-danger'>In Active</span>`,
                                                    `<span class='badge badge-success'>Active</span>`
                                                ][modul.status]
                                            "
                                        ></td>
                                        <td>
                                            <router-link
                                                :to="{
                                                    name: 'module_view',
                                                    params: { id: modul.id }
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
                                                    name: 'module_update',
                                                    params: { id: modul.id }
                                                }"
                                                class="btn btn-link px-1"
                                            >
                                                <i
                                                    class=" text-secondary fa fa-pencil"
                                                    aria-hidden="true"
                                                ></i>
                                            </router-link>
                                            <a
                                                class="btn btn-link px-1"
                                                href="#delete_modal"
                                                data-toggle="modal"
                                                @click="
                                                    (delete_data.id = modul.id),
                                                        (delete_data.index = index)
                                                "
                                            >
                                                <i
                                                    class=" text-danger fa fa-trash"
                                                    aria-hidden="true"
                                                ></i>
                                            </a>
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
            :deleteFunction="moduleDelete"
        ></dataDeleteModal>
    </div>
</template>
<script>
import dataDeleteModal from "../../inc/delete_modal";

export default {
    data() {
        return {
            all_modules: null,
            delete_data: {
                id: null,
                index: null
            }
        };
    },
    methods: {
        getModule() {
            axios.get("/api/module").then(response => {
                this.all_modules = response.data;
                setTimeout(function() {
                    window.loadDataTable();
                }, 1000);
            });
        },
        moduleDelete(id, index) {
            axios.delete(`/api/module/${id}`).then(res => {
                this.all_modules.splice(index, 1);

                this.$toast.success({
                    title: "SUCCESS",
                    message: res.data
                });
            });
        }
    },
    mounted() {
        this.getModule();
    },
    components: {
        dataDeleteModal
    }
};
</script>

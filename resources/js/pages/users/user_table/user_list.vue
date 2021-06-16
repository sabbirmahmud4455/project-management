<template lang="">
    <div>
        <div style="overflow: auto">
            <router-link
                :to="{
                    name: 'user_create'
                }"
                class="btn btn-outline-success"
                style="float:right"
            >
                Create New
            </router-link>
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Types</th>
                        <th>Roles</th>
                        <th>Contact No</th>
                        <th>Status</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-if="all_users"
                        v-for="(user, index) in all_users"
                        :key="index"
                    >
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <span
                                class="badge badge-primary"
                                v-if="user.types"
                                v-for="(type, index) in user.types"
                                :key="index"
                                >{{ type.name }}</span
                            >
                        </td>
                        <td>
                            <span
                                class="badge badge-primary"
                                v-if="user.roles"
                                v-for="(role, index) in user.roles"
                                :key="index"
                                >{{ role.name }}</span
                            >
                        </td>
                        <td>{{ user.contact_no }}</td>
                        <td
                            v-html="
                                [
                                    `<span class='badge badge-danger'>In Active</span>`,
                                    `<span class='badge badge-success'>Active</span>`
                                ][user.status]
                            "
                        ></td>
                        <td>
                            <img style="width:50px" :src="user.photo" alt="" />
                        </td>
                        <td>
                            <router-link
                                :to="{
                                    name: 'user_profile',
                                    params: { id: user.id }
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
                                    name: 'user_update',
                                    params: { id: user.id }
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
                                    (delete_data.id = user.id),
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

        <!-- delete Modal HTML -->
        <dataDeleteModal
            :id="delete_data.id"
            :index="delete_data.index"
            :deleteFunction="userDelete"
        ></dataDeleteModal>
    </div>
</template>
<script>
import dataDeleteModal from "../../../inc/delete_modal";

export default {
    data() {
        return {
            all_users: null,
            delete_data: {
                id: null,
                index: null
            }
        };
    },
    methods: {
        getUser() {
            axios.get("/api/user").then(response => {
                this.all_users = response.data;
                setTimeout(function() {
                    window.loadDataTable();
                }, 1000);
            });
        },
        userDelete(id, index) {
            axios.delete(`/api/user/${id}`).then(res => {
                $("#delete_modal").modal("hide");

                this.all_users.splice(index, 1);

                this.$toast.success({
                    title: "SUCCESS",
                    message: res.data
                });
            });
        }
    },
    mounted() {
        this.getUser();
    },
    components: {
        dataDeleteModal
    }
};
</script>

<template lang="">
    <div>


 <router-link
                                    :to="{
                                        name: 'user_create',
                                        
                                    }"
                                    class="btn btn-outline-success"
                                >
                                    
                                    Create New
                                </router-link>

<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Role</th>
                    <th>Contact No</th>
                    <th>Status</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr  v-if="all_users"
                            v-for="(user, index) in all_users"
                            :key="index">
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.contact_no}}</td>
                    <td v-html="[`<span class='badge badge-danger'>In Active</span>`,`<span class='badge badge-success'>Active</span>`][user.status]"></td>
                    <td><img style="width:50px" :src="user.photo" alt=""></td>
                    <td>
                        <router-link
                                    :to="{
                                        name: 'user_profile',
                                        params: { id: user.id }
                                    }"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="fas fa-folder"> </i>
                                    View
                                </router-link>
                                <router-link
                                    :to="{
                                        name: 'user_update',
                                        params: { id: user.id }
                                    }"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </router-link>
                                <a
                                    class="btn btn-danger btn-sm"
                                    href="#delete_modal"
                                    data-toggle="modal"
                                    @click="
                                        (delete_data.id = user.id),
                                            (delete_data.index = index)
                                    "
                                >
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                    </td>

                  </tr>

                </tbody>
              </table>

        <!-- delete Modal HTML -->
        <dataDeleteModal :id="delete_data.id" :index="delete_data.index" :deleteFunction="userDelete"></dataDeleteModal>



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
        index: null,
      },
    };
  },
  methods: {
    getUser() {
      axios.get("/api/user").then((response) => {
        this.all_users = response.data;
        setTimeout(function () {
          window.loadDataTable();
        }, 1000);
      });
    },
    userDelete(id, index) {
      axios.delete(`/api/user/${id}`).then((res) => {
        $("#delete_modal").modal("hide");

        this.all_users.splice(index, 1);

        this.$toast.success({
          title: "SUCCESS",
          message: res.data,
        });
      });
    },
  },
  mounted() {
    this.getUser();
  },
  components: {
    dataDeleteModal,
  },
};
</script>

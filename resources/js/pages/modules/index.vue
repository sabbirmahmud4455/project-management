<template lang="">


<div>
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Modules Page</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
               <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="fa fa-home fa-lg"></i>
                    </router-link>
                </li>
                <li class="breadcrumb-item active">
                    Modules
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                       <router-link
                                    :to="{
                                        name: 'module_create',

                                    }"
                                    class="btn btn-outline-success"
                                >

                                    Create New
                                </router-link>
                        <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>title</th>
                    <th>project</th>
                    <th>status </th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr  v-if="all_modules"
                            v-for="(modul, index) in all_modules"
                            :key="index">
                    <td>{{modul.name}}</td>
                    <td>{{modul.name}}</td>
                    <td>{{modul.title}}</td>
                    <td><span>
                        {{modul.project?modul.project.name:"N/A"}}
                        </span>
                    </td>
                    <td v-html="[`<span class='badge badge-danger'>In Active</span>`,`<span class='badge badge-success'>Active</span>`][modul.status]"></td>
                    <td>
                        <router-link
                                    :to="{
                                        name: 'module_view',
                                        params: { id: modul.id }
                                    }"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="fas fa-folder"> </i>
                                    View
                                </router-link>
                                <router-link
                                    :to="{
                                        name: 'module_update',
                                        params: { id: modul.id }
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
                                        (delete_data.id = modul.id),
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

                    </div>
                </div>
            </div>
        </div>
        <!-- delete Modal HTML -->
         <dataDeleteModal :id="delete_data.id" :index="delete_data.index" :deleteFunction="moduleDelete"></dataDeleteModal>

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
        index: null,
      },
    };
  },
  methods: {
    getModule() {
      axios.get("/api/module").then((response) => {
        this.all_modules = response.data;
        setTimeout(function () {
          window.loadDataTable();
        }, 1000);
      });
    },
    moduleDelete(id, index) {
      axios.delete(`/api/module/${id}`).then((res) => {
        this.all_modules.splice(index, 1);

        this.$toast.success({
          title: "SUCCESS",
          message: res.data,
        });
      });
    },
  },
  mounted() {
    this.getModule();
  },
  components: {
    dataDeleteModal,
  },
};
</script>

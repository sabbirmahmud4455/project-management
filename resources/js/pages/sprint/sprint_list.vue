<template>
  <div>
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i>Sprints</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">
            <i class="fa fa-home fa-lg"></i>
          </router-link>
        </li>
        <li class="breadcrumb-item active">Sprint</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <router-link
              :to="{
                name: 'sprint_create',
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
                  v-for="(sprint, index) in all_sprints"
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
                        params: { id: sprint.id },
                      }"
                      class="btn btn-info btn-sm"
                    >
                      <i class="fas fa-folder"> </i>
                      View
                    </router-link>
                    <router-link
                      :to="{
                        name: 'sprint_update',
                        params: { id: sprint.id },
                      }"
                      class="btn btn-info btn-sm"
                    >
                      <i class="fas fa-pencil-alt"> </i>
                      Edit
                    </router-link>
                    <button
                      class="btn btn-danger btn-sm"
                      href="#delete_modal"
                      data-toggle="modal"
                      @click="
                        (delete_data.id = sprint.id),
                          (delete_data.index = index)
                      "
                    >
                      <i class="fas fa-trash"> </i>
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
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
        index: null,
      },
    };
  },
  methods: {
    getSprint() {
      axios.get("/api/sprint").then((response) => {
        this.all_sprints = response.data;
        setTimeout(function () {
          window.loadDataTable();
        }, 1000);
      });
    },
    sprintDelete(id, index) {
      axios.delete(`/api/sprint/${id}`).then((res) => {
        $("#delete_modal").modal("hide");
        this.all_sprints.splice(index, 1);

        this.$toast.success({
          title: "SUCCESS",
          message: "Sprint Deleted Successfully",
        });
      });
    },
  },
  mounted() {
    this.getSprint();
  },
  components: {
    dataDeleteModal,
  },
};
</script>

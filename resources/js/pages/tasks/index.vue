<template lang="">
<div>
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-home fa-lg"></i>
                </li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

        <table class="table table-hover table-bordered" id="sampleTable">
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
                  <tr  v-if="all_tasks"
                            v-for="(task, index) in all_tasks"
                            :key="index">
                    <td>{{index +1}}</td>
                    <td>{{task.name}}</td>
                    <td>  {{task.project?task.project.name:"N/A"}}</td>
                    <td>{{task.module?task.module.name:"N/A"}}</td>
                    <td>{{task.type}}</td>
                    <td><span>

                        </span>
                    </td>
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
                                <a
                                    class="btn btn-danger btn-sm"
                                    href="#delete_modal"
                                    data-toggle="modal"
                                    @click="
                                        (delete_data.data = user),
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
                        <div id="delete_modal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fas fa-trash-alt material-icons"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger"  data-dismiss='modal' @click="taskDelete(delete_data.data , delete_data.index)">Delete</button>
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
      all_tasks: null,
      delete_data: {
        data: [],
        index: [],
      },
    };
  },
  methods: {
    getTask() {
      axios.get("/api/task").then((response) => {
        this.all_tasks = response.data;
        setTimeout(function () {
          window.loadDataTable();
        }, 1000);
      });
    },
    taskDelete(data, index) {
      axios.delete(`/api/task/${data.id}`).then((res) => {
        this.all_tasks.data.splice(index, 1);

        this.$toast.success({
          title: "SUCCESS",
          message: res.data,
        });
      });
    },
  },
  mounted() {
    this.getTask();
  },
};
</script>

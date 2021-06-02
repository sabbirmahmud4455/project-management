<template lang="">
    <div>


<div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i>projects</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="fa fa-home fa-lg"></i>
                    </router-link>
                </li>
                <li class="breadcrumb-item active">
                    Users
                </li>

                <!-- <li class="breadcrumb-item">
                    <i class="fa fa-home fa-lg"></i>
                </li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li> -->
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">



      <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th> Start Date </th>
                    <th> End Date </th>
                    <th>Status</th>
                    <th> Dev Cost </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr  v-if="all_projects" v-for="(project, index) in all_projects" :key="index">
                    <td>{{project.name}}</td>
                    <td>{{project.type}}</td>
                    <td>{{project.start_date}}</td>
                    <td>{{project.end_date}}</td>
                    <td >
                        {{project.status}}
                    </td>
                    <td>{{project.development_cost}}</td>
                    <td>
                         <router-link  :to="{name:'project_view', params:{id: project.id}}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </router-link>
                                                <router-link  :to="{name:'project_update', params:{id: project.id}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </router-link>
                                                <a class="btn btn-danger btn-sm" href="#delete_modal"  data-toggle="modal" @click="delete_data.data=project, delete_data.index=index">
                                                    <i class="fas fa-trash">
                                                    </i>
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
                                        <button type="button" class="btn btn-danger"  data-dismiss='modal' @click="projectDelete(delete_data.data , delete_data.index)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>
<script>
export default {
  data() {
    return {
      all_projects: null,
      delete_data: {
        data: [],
        index: [],
      },
    };
  },
  methods: {
    getProject() {
      axios.get("/api/project").then((response) => {
        this.all_projects = response.data;
        setTimeout(function () {
          window.loadDataTable();
        }, 1000);
      });
    },
    projectDelete(data, index) {
      axios.delete(`/api/project/${data.id}`).then((res) => {
        this.all_projects.data.splice(index, 1);

        this.$toast.success({
          title: "SUCCESS",
          message: res.data,
        });
      });
    },
  },
  mounted() {
    this.getProject();
  },
};
</script>

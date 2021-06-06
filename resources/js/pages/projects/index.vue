<template lang="">
    <div>


<div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i>Projects</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="fa fa-home fa-lg"></i>
                    </router-link>
                </li>
                <li class="breadcrumb-item active">
                    Project
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


 <router-link
                                    :to="{
                                        name: 'project_create',
                                        
                                    }"
                                    style="float:right"
                                    class="btn btn-outline-success"
                                >
                                    
                                    Create New
                                </router-link>
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
                                                <button class="btn btn-danger btn-sm" href="#delete_modal"  data-toggle="modal" @click="delete_data.id=project.id, delete_data.index=index">
                                                    <i class="fas fa-trash">
                                                    </i>
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
        <dataDeleteModal :id="delete_data.id" :index="delete_data.index" :deleteFunction="projectDelete"></dataDeleteModal>
                       
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
import dataDeleteModal from '../../inc/delete_modal'
export default {
  data() {
    return {
      all_projects: null,
      delete_data: {
        id: null,
        index: null,
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
    projectDelete(id, index) {
      axios.delete(`/api/project/${id}`).then((res) => {
                $("#delete_modal").modal('hide');

        this.all_projects.splice(index, 1);
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
  components:{
    dataDeleteModal
  }
};
</script>

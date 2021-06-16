<template lang="">
    <div>


        <div class="row" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Projects</h4>

      <div style="overflow: auto" >
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
                    <td>{{project.start_date}}</td>
                    <td>{{project.end_date}}</td>
                    <td >
                        {{project.status}}
                    </td>
                    <td>{{project.development_cost}}</td>
                    <td>
                         <router-link  :to="{name:'project_view', params:{id: project.id}}" class="btn btn-link px-1">
                                                    <i
                                                    class=" text-primary fa fa-eye"
                                                    aria-hidden="true"
                                                ></i>
                                                </router-link>
                                                <router-link  :to="{name:'project_update', params:{id: project.id}}" class="btn btn-link px-1">
                                                <i
                                                    class=" text-secondary fa fa-pencil"
                                                    aria-hidden="true"
                                                ></i>
                                                </router-link>
                                                <!-- <button class="btn btn-link px-1" href="#delete_modal"  data-toggle="modal" @click="delete_data.id=project.id, delete_data.index=index">
                                                   <i
                                                    class=" text-danger fa fa-trash"
                                                    aria-hidden="true"
                                                ></i>
                                                </button> -->
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
import dataDeleteModal from "../../inc/delete_modal";
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
        $("#delete_modal").modal("hide");

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
  components: {
    dataDeleteModal,
  },
};
</script>

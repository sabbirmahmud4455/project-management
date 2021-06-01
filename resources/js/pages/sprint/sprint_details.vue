<template>
  <div>
    <div class="content-wrapper" style="min-height: 1416.81px">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sprint Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link :to="{ name: 'home' }"> Home </router-link>
                </li>
                <li class="breadcrumb-item">
                  <router-link :to="{ name: 'sprints' }"> Sprints </router-link>
                </li>
                <li class="breadcrumb-item active">Sprint Details</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Name</b>
                      <span v-if="name" class="float-right">{{ name }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>Type</b>
                      <span v-if="type" class="float-right">{{ type }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>Start Date</b>
                      <span class="float-right" v-if="start_date">{{
                        start_date
                      }}</span>
                    </li>
                    <li class="list-group-item">
                      <b>End Date</b>
                      <span class="float-right" v-if="end_date">
                        {{ end_date }}</span
                      >
                    </li>

                    <li class="list-group-item">
                      <b>Purposes</b>
                      <span class="float-right" v-if="purposes">
                        {{ purposes }}</span
                      >
                    </li>
                    <li class="list-group-item">
                      <b>Status</b>
                      <span class="float-right" v-if="status">
                        {{ status }}</span
                      >
                    </li>

                    <li class="list-group-item">
                      <b class="d-block">Description </b>
                      <div v-if="description" v-html="description"></div>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-header d-flex">
                  <h4 class="card-title">Sprint Task</h4>
                  <router-link
                    class="btn btn-primary ml-auto"
                    :to="{
                      name: 'sprint_task',
                      params: { id: sprintID },
                    }"
                    >Add Task</router-link
                  >
                </div>
                <div class="card-body row">
                  <div
                    class="col-4"
                    v-if="SprintTask"
                    v-for="(sprint_task, index) in SprintTask"
                    :key="index"
                  >
                    <div class="card">
                      <div class="card-body d-flex">
                        <div>
                          <h6 class="card-title">
                            <strong>Task Name :</strong>
                            {{ sprint_task.task.name }}
                          </h6>
                          <hr />
                          <p>
                            <strong>Priority :</strong>
                            {{ sprint_task.priority }}
                          </p>
                          <p>
                            <strong>Asign To :</strong>
                            <span v-if="sprint_task.user">{{
                              sprint_task.user.name
                            }}</span>
                          </p>
                        </div>

                        <div class="ml-auto d-flex align-items-center">
                          <ul>
                            <li>
                              <button class="btn btn-primary">
                                stasut
                              </button >
                            </li>
                            <li>
<button  class="btn btn-success">
                            <i class="fas fa-pencil-alt    "></i>
                          </button>
                            </li>
                            <li>
<button @click="delete_sprint_task(sprint_task.id, index)" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                            </li>
                          </ul>
                          
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      tasks: [],
      sprintID: this.$route.params.id,

      allUsers: null,
      allProject: null,
      SprintTask: null,
      name: null,
      type: null,
      start_date: null,
      end_date: null,
      purposes: null,
      description: null,
      status: null,
    };
  },
  methods: {
    delete_sprint_task(id, index){
      console.log(id);
      axios.delete(`/api/sprint/sprint-task/${id}`).then(res=>{
        this.SprintTask.splice(index, 1);
        this.$toast.success({
            title: "SUCCESS",
            message: "Sprint-Task Delete Successfully",
          });
      })
    },
    getSprint() {
      axios.get(`/api/sprint/${this.sprintID}`).then((response) => {
        this.name = response.data.name;
        this.type = response.data.type;
        this.start_date = response.data.start_date;
        this.end_date = response.data.end_date;
        this.purposes = response.data.purposes;
        this.description = response.data.description;
        this.status = response.data.status;
        if (response.data.sprint_task.length) {
          this.SprintTask = response.data.sprint_task;
        }
      });
    },
  },
  mounted() {
    this.getSprint();
  },
};
</script>
<style lang=""></style>

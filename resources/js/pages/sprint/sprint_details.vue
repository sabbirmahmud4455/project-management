<template>
  <div>
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Sprint Details Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">
            <i class="fa fa-home" aria-hidden="true"></i>
          </router-link>
        </li>
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'sprints' }"> Sprints </router-link>
        </li>
        <li class="breadcrumb-item active">Sprint Details</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
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
                    <span class="float-right" v-if="status"> {{ status }}</span>
                  </li>

                  <li class="list-group-item">
                    <b class="d-block">Description </b>
                    <div v-if="description" v-html="description"></div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header d-flex">
                <h4 class="card-title">Sprint Task</h4>
                <router-link
                  class="btn btn-primary ml-auto"
                  :to="{
                    name: 'sprint_task',
                    params: { id: sprintID, tasks: SprintTask },
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
                            <button class="btn btn-primary">Status</button>
                          </li>
                          <li>
                            <!-- Button trigger modal -->
                            <button
                              type="button"
                              class="btn btn-success"
                              data-toggle="modal"
                              data-target="#sprint_task_update"
                            >
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                          </li>
                          <li>
                            <button
                              @click="delete_sprint_task(sprint_task.id, index)"
                              class="btn btn-danger"
                            >
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
      </div>
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
    delete_sprint_task(id, index) {
      console.log(id);
      axios.delete(`/api/sprint/sprint-task/${id}`).then((res) => {
        this.SprintTask.splice(index, 1);
        this.$toast.success({
          title: "SUCCESS",
          message: "Sprint-Task Delete Successfully",
        });
      });
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

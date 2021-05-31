<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Sprint Task</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="">Tasks</label>
                          <div class="d-flex">
                            <span class="mx-2">
                              <div class="form-check">
                                <label
                                  @click="form.tasks = []"
                                  class="form-check-label"
                                >
                                  <input
                                    type="radio"
                                    class="form-check-input"
                                    name="tasks"
                                    v-model="task_category"
                                    value="independent_task"
                                    checked
                                  />
                                  independent Task
                                </label>
                              </div>
                            </span>
                            <span class="mx-2">
                              <div class="form-check">
                                <label
                                  @click="form.tasks = []"
                                  class="form-check-label"
                                >
                                  <input
                                    type="radio"
                                    v-model="task_category"
                                    class="form-check-input"
                                    name="tasks"
                                    id=""
                                    value="module_task"
                                    checked
                                  />
                                  Prject/Module Task
                                </label>
                              </div>
                            </span>
                          </div>
                        </div>

                        <div v-if="task_category === 'independent_task'">
                          <div class="card">
                            <div class="card-header d-flex">
                              <h5>Tasks List</h5>
                              <button class="ml-auto btn-primary">
                                Carate Task
                              </button>
                            </div>
                            <div class="card-body row">
                              <div
                                class="col-md-4"
                                v-for="(task, index) in allTask"
                                :key="index"
                                v-if="allTask"
                              >
                                <div class="card">
                                  <div class="card-body">
                                    <label :for="'task' + task.id">{{
                                      task.name
                                    }}</label>
                                    <input
                                      v-model="form.tasks.id"
                                      :value="task.id"
                                      type="checkbox"
                                      name=""
                                      :id="'task' + task.id"
                                    />

                                    <div class="form-group">
                                      <label for="">Priority</label>
                                      <div class="d-flex">
                                        <span class="mx-2">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input
                                                type="radio"
                                                class="form-check-input"
                                                name="priority"
                                                v-model="form.priority"
                                                value="low"
                                              />
                                              low
                                            </label>
                                          </div>
                                        </span>
                                        <span class="mx-2">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input
                                                type="radio"
                                                class="form-check-input"
                                                name="priority"
                                                v-model="form.priority"
                                                value="Medium"
                                              />
                                              Medium
                                            </label>
                                          </div>
                                        </span>
                                        <span class="mx-2">
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input
                                                type="radio"
                                                class="form-check-input"
                                                name="priority"
                                                v-model="form.priority"
                                                value="High"
                                              />
                                              High
                                            </label>
                                          </div>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Assigned To</label>

                                      <select
                                        v-model="form.asigneTo"
                                        class="form-control"
                                        name=""
                                        id=""
                                      >
                                        <option :value="null">
                                          Select Member
                                        </option>
                                        <option
                                          class="w-100"
                                          v-for="(user, index) in allUsers"
                                          :key="index"
                                          :value="user.id"
                                        >
                                          <div class="w-100 d-flex">
                                            <span>{{ user.name }}</span>
                                          </div>
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div v-if="task_category === 'module_task'">
                          <div class="form-group">
                            <label for="project_input">Project</label>
                            <select
                              class="form-control"
                              name=""
                              id="project_input"
                            >
                              <option @click="form.tasks = []" :valeu="null">
                                Select Project
                              </option>
                              <option
                                v-for="(project, index) in allProject"
                                :key="index"
                                @click="getProjectTask(project.id)"
                                :value="project.id"
                              >
                                {{ project.name }}
                              </option>
                            </select>
                          </div>
                          <div v-if="projectTask" class="col-12">
                            <h5>Task List</h5>
                          </div>

                          <div
                            class="col-md-4 col"
                            v-if="projectTask"
                            v-for="(task, index) in projectTask"
                            :key="index"
                          >
                            <div class="card">
                              <div class="card-body">
                                <label :for="'task' + task.id">{{
                                  task.name
                                }}</label>
                                <input
                                  v-model="form.tasks"
                                  :value="task.id"
                                  type="checkbox"
                                  name=""
                                  :id="'task' + task.id"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button
                    @click="updateSprintTask"
                    :disabled="!form.tasks.length"
                    class="btn btn-block btn-primary"
                  >
                    Update
                  </button>
                </div>
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
      allUsers: null,
      allProject: null,
      allTask: null,
      projectTask: null,
      task_category: null,
      form: {
        spritnID: this.$route.params.id,
        priority: "low",
        asigneTo: null,
        tasks: [],
      },
    };
  },
  methods: {
    updateSprintTask() {
      axios.post("/api/sprint/sprint-task", this.form).then((res) => {
        console.log(res.data);
      });
    },
    getUsers() {
      axios.get("/api/all_users").then((res) => {
        this.allUsers = res.data;
      });
    },
    getAllTask() {
      axios.get("/api/tasks-list").then((res) => {
        this.allTask = res.data;
      });
    },
    getProject() {
      axios.get("/api/all_projects").then((res) => {
        this.allProject = res.data;
      });
    },
    getProjectTask(id) {
      this.selectTask = [];
      axios.get(`/api/project/task/w/${id}`).then((res) => {
        this.projectTask = res.data;
      });
    },
  },
  mounted() {
    this.getUsers();
    this.getProject();
    this.getAllTask();
  },
};
</script>

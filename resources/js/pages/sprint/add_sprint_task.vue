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
                                  @click="getIndependentTask()"
                                  C
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
                                  @click="
                                    (finalSelectedTask = []), (tasks = [])
                                  "
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

                          <div v-if="projectModules" class="form-group">
                            <label for="module_input">Module</label>
                            <select
                              class="form-control"
                              name=""
                              id="module_input"
                            >
                              <option :valeu="null">Select Module</option>
                              <option
                                v-for="(projectModule, index) in projectModules"
                                :key="index"
                                @click="getModuleTask(projectModule.id)"
                                :value="projectModule.id"
                              >
                                {{ projectModule.name }}
                              </option>
                            </select>
                          </div>
                          <div v-if="tasks" class="col-12">
                            <h5>Task List</h5>
                          </div>
                        </div>

                        <div class="row">
                          <div
                            class="col-4"
                            v-if="tasks"
                            v-for="(task, index) in tasks"
                            :key="index"
                          >
                            <allTaskList
                              :updateAllTask="updateAllTask"
                              :sprint="spritnID"
                              :task="task"
                              :users="allUsers"
                              :index="index"
                            ></allTaskList>
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
                    @click="updateSprintTask()"
                    :disabled="!finalSelectedTask.length"
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
import allTaskList from "../../inc/sprint_tasks";
export default {
  data() {
    return {
      spritnID: this.$route.params.id,
      allTasks: [],
      finalSelectedTask: [],
      allUsers: null,
      allProject: null,
      tasks: null,
      projectModules: null,
      task_category: null,
    };
  },
  methods: {
    updateAllTask(index, task) {
      this.allTasks[index] = task;
      this.finalSelectedTask = this.allTasks.filter((task) => task.selectTasks);
    },
    updateSprintTask() {
      axios
        .post("/api/sprint/sprint-task", {
          selectedTask: this.finalSelectedTask,
        })
        .then((res) => {
          this.$toast.success({
            title: "SUCCESS",
            message: "Sprint-Task Updated Successfully",
          });
        });
    },
    getProjectModule(id) {
      axios.get(`/api/product_modules/${id}`).then((response) => {
        this.projectModules = response.data;
      });
    },
    getUsers() {
      axios.get("/api/all_users").then((res) => {
        this.allUsers = res.data;
      });
    },
    getIndependentTask() {
      this.tasks = [];
      this.finalSelectedTask = [];

      axios.get("/api/tasks/independent-task").then((res) => {
        this.tasks = res.data;
        this.allTasks = res.data.map((task) => {
          return { ...task, selectTasks: false };
        });
      });
    },
    getProject() {
      axios.get("/api/all_projects").then((res) => {
        this.allProject = res.data;
      });
    },
    getProjectTask(id) {
      this.finalSelectedTask = [];
      this.getProjectModule(id);

      this.selectTask = [];
      axios.get(`/api/project/task/w/${id}`).then((res) => {
        this.tasks = res.data;
      });
      this.selectTask = [];
      axios.get(`/api/project/task/w/${id}`).then((res) => {
        this.tasks = res.data;
      });
    },
    getModuleTask(id) {
      this.finalSelectedTask = [];
      axios.get(`/api/module/task/w/${id}`).then((res) => {
        this.tasks = res.data;
      });
    },
  },
  mounted() {
    this.getUsers();
    this.getProject();
    this.getIndependentTask();
  },

  components: {
    allTaskList,
  },
};
</script>

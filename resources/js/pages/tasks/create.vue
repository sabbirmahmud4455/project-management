<template>
  <div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Create Task</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link :to="{ name: 'home' }"> Home </router-link>
                </li>
                <li class="breadcrumb-item">
                  <router-link :to="{ name: 'tasks' }"> Tasks </router-link>
                </li>
                <li class="breadcrumb-item active">Create Task</li>
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
            <div class="col">
              <div class="card card-primary">
                <div class="card-header d-flex">
                  <h3 class="card-title">Task</h3>
                </div>
                <!-- /.card-header -->
                <form
                  @submit.prevent="createTask()"
                  @keydown="form.onKeydown($event)"
                >
                  <div class="card-body row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="task_name">Name *</label>
                        <input
                          v-model="form.name"
                          type="text"
                          name="name"
                          class="form-control"
                          placeholder="Enter Name"
                          :class="{
                            'is-invalid': form.errors.has('name'),
                          }"
                        />
                        <has-error :form="form" field="name"></has-error>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputStatus">Project</label>
                        <select
                          v-model="form.project_id"
                          class="form-control custom-select"
                          :class="{
                            'is-invalid': form.errors.has('project_id'),
                          }"
                        >
                          <option @click="all_modules=null, form.module_id=0" value="0">
                            Select Project
                          </option>
                          <option
                            v-if="all_projects.length"
                            v-for="(project, index) in all_projects"
                            :key="index"
                            :value="project.id"
                            @click="getModule(form.project_id)"
                          >
                            {{ project.name }}
                          </option>
                        </select>
                        <has-error :form="form" field="project_id"></has-error>
                      </div>
                    </div>
                    <div class="col-md-6" v-if="all_modules">
                      <div class="form-group">
                        <label for="inputStatus">Module</label>
                        <select
                          v-model="form.module_id"
                          class="form-control custom-select"
                          :class="{
                            'is-invalid': form.errors.has('module_id'),
                          }"
                        >
                          <option value="0">Select Module</option>
                          <option
                            v-for="(module, index) in all_modules"
                            :key="index"
                            :value="module.id"
                          >
                            {{ module.name }}
                          </option>
                        </select>
                        <has-error :form="form" field="project_id"></has-error>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="inputStatus">Type</label>
                        <select
                          v-model="form.type"
                          class="form-control custom-select"
                          :class="{
                            'is-invalid': form.errors.has('type'),
                          }"
                        >
                          <option :value="null">Task Type</option>
                          <option value="Epic">Epic</option>
                          <option value="Story">Story</option>
                          <option value="Development">Development</option>
                          <option value="Bug">Bug</option>
                          <option value="Update">Update</option>
                          <option value="Change Request">Change Request</option>
                          <option value="Idea">Idea</option>
                          <option value="Enhancement">Enhancement</option>
                          <option value="Research & Do">Research & Do</option>
                          <option value="Maintenance">Maintenance</option>
                          <option value="Quality Assurance">
                            Quality Assurance
                          </option>
                          <option value="Unit Testing">Unit Testing</option>
                          <option value="Enhancement">Enhancement</option>
                        </select>
                        <has-error :form="form" field="project_id"></has-error>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="address">Description</label>
                        <vue-editor v-model="form.description" />
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                      Create Task
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.col-md-6 -->
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
import { Form } from "vform";
import { VueEditor } from "vue2-editor";

export default {
  data() {
    return {
      all_projects: [],
      all_modules: null,
      all_users: [],
      form: new Form({
        project_id: 0,
        module_id: 0,
        assign_to: 0,
        type: null,
        name: "",
        description: '<h4 class="text-muted">Task Details</h4>',
      }),
    };
  },
  methods: {
    getProject() {
      axios.get("/api/all_projects").then((response) => {
        this.all_projects = response.data;
      });
    },
    getModule(id) {
      axios.get(`/api/product_modules/${id}`).then((response) => {
        this.all_modules = response.data;
      });
    },
    getUser() {
      axios.get("/api/all_users").then((response) => {
        this.all_users = response.data;
      });
    },
    createTask() {
      this.form
        .post("/api/task")
        .then((response) => {
          this.form.name = "";
          this.form.project_id = 0;
          this.form.module_id = 0;
          this.form.assign_to = 0;
          this.form.description = '<h4 class="text-muted">task Details</h4>';
          this.$toast.success({
            title: "SUCCESS",
            message: "task Created Successfully",
          });
        })
        .catch((error) => {
          if (error.response.data.errors.name) {
            this.$toast.error({
              title: "! ERRORS",
              message: error.response.data.errors.name[0],
            });
          }
          if (error.response.data.errors.project_id) {
            this.$toast.error({
              title: "! ERRORS",
              message: error.response.data.errors.project_id[0],
            });
          }
        });
    },
  },
  mounted() {
    this.getProject();
    this.getUser();
  },
  components: {
    VueEditor,
  },
};
</script>
<style lang=""></style>

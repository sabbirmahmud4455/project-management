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
                                                    <label for=""
                                                        >Task Type</label
                                                    >
                                                    <div class="d-flex">
                                                        <span class="mx-2">
                                                            <div
                                                                class="form-check"
                                                            >
                                                                <label
                                                                    @click="
                                                                        getIndependentTask()
                                                                    "
                                                                    C
                                                                    class="form-check-label"
                                                                >
                                                                    <input
                                                                        type="radio"
                                                                        class="form-check-input"
                                                                        name="tasks"
                                                                        v-model="
                                                                            task_category
                                                                        "
                                                                        value="independent_task"
                                                                        checked
                                                                    />
                                                                    independent
                                                                    Task
                                                                </label>
                                                            </div>
                                                        </span>
                                                        <span class="mx-2">
                                                            <div
                                                                class="form-check"
                                                            >
                                                                <label
                                                                    @click="
                                                                        (finalSelectedTask = []),
                                                                            (tasks = [])
                                                                    "
                                                                    class="form-check-label"
                                                                >
                                                                    <input
                                                                        type="radio"
                                                                        v-model="
                                                                            task_category
                                                                        "
                                                                        class="form-check-input"
                                                                        name="tasks"
                                                                        id=""
                                                                        value="module_task"
                                                                        checked
                                                                    />
                                                                    Prject/Module
                                                                    Task
                                                                </label>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div
                                                    v-if="
                                                        task_category ===
                                                            'independent_task'
                                                    "
                                                >
                                                    <independentTaskForm
                                                        :sprintID="
                                                            this.$route.params
                                                                .id
                                                        "
                                                    ></independentTaskForm>
                                                </div>

                                                <div
                                                    v-if="
                                                        task_category ===
                                                            'module_task'
                                                    "
                                                >
                                                    <div class="form-group">
                                                        <label
                                                            for="project_input"
                                                            >Project</label
                                                        >
                                                        <select
                                                            @change="
                                                                getProjectTask()
                                                            "
                                                            class="form-control"
                                                            name=""
                                                            v-model="projectID"
                                                            id="project_input"
                                                        >
                                                            <option
                                                                selected
                                                                @click="
                                                                    form.tasks = []
                                                                "
                                                                :value="-1"
                                                            >
                                                                Select Project
                                                            </option>
                                                            <option
                                                                v-for="(project,
                                                                index) in allProject"
                                                                :key="index"
                                                                :value="
                                                                    project.id
                                                                "
                                                            >
                                                                {{
                                                                    project.name
                                                                }}
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        v-if="projectModules"
                                                        class="form-group"
                                                    >
                                                        <label
                                                            for="module_input"
                                                            >Module</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            name=""
                                                            @change="
                                                                getModuleTask()
                                                            "
                                                            id="module_input"
                                                            v-model="moduleId"
                                                        >
                                                            <option
                                                                selected
                                                                :value="-1"
                                                                >Select
                                                                Module</option
                                                            >
                                                            <option
                                                                v-for="(projectModule,
                                                                index) in projectModules"
                                                                :key="index"
                                                                :value="
                                                                    projectModule.id
                                                                "
                                                            >
                                                                {{
                                                                    projectModule.name
                                                                }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
                                                        v-if="tasks"
                                                        class="col-12"
                                                    >
                                                        <h5>Task List</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col-4"
                                                            v-if="tasks"
                                                            v-for="(task,
                                                            index) in tasks"
                                                            :key="index"
                                                        >
                                                            <allTaskList
                                                                :updateAllTask="
                                                                    updateAllTask
                                                                "
                                                                :sprint="
                                                                    spritnID
                                                                "
                                                                :task="task"
                                                                :users="
                                                                    allUsers
                                                                "
                                                                :index="index"
                                                            ></allTaskList>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- /.card-body -->
                                <div
                                    class="card-footer"
                                    v-if="finalSelectedTask.length"
                                >
                                    <button
                                        @click="updateSprintTask()"
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

        <!-- Modal -->
        <div
            class="modal fade"
            id="create_task_with_sprint"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="task_name">Task Name</label>
                                        <input
                                            type="text"
                                            name=""
                                            v-model="newTask.task_name"
                                            id="task_name"
                                            class="form-control"
                                            placeholder="Enter Task Name"
                                            aria-describedby="helpId"
                                        />
                                        <small id="helpId" class="text-muted"
                                            >Help text</small
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 col"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="createTaskWithSprint()"
                        >
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import allTaskList from "../../inc/sprint_tasks";
import independentTaskForm from "./independent_task_form.vue";
export default {
    data() {
        return {
            spritnID: this.$route.params.id,
            allTasks: [],
            finalSelectedTask: [],
            allProject: null,
            tasks: null,
            projectModules: null,
            task_category: "independent_task",
            projectID: null,
            moduleId: null,
            existingId: [],
            newTask: {
                sprint_id: this.$route.params.id,
                task_name: null,
                priority: null,
                assigned_to: null,
                status: null
            }
        };
    },
    methods: {
        createTaskWithSprint() {
            axios.put("/api/task_sprint", this.newTask).then(res => {
                this.$toast.success({
                    title: "SUCCESS",
                    message: "Task And Sprint-Task Created Successfully"
                });
            });
        },
        getExistingTasksId() {
            axios.get(`/api/sprint/${this.$route.params.id}`).then(response => {
                this.existingId = response.data.sprint_task.map(
                    task => task.task_id
                );
            });
        },
        updateAllTask(index, task) {
            this.allTasks[index] = task;
            this.finalSelectedTask = this.allTasks.filter(
                task => task.selectTasks
            );
        },
        updateSprintTask() {
            axios
                .post("/api/sprint/sprint-task", {
                    selectedTask: this.finalSelectedTask
                })
                .then(res => {
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "Sprint-Task Updated Successfully"
                    });
                });
        },
        getProjectModule(id) {
            axios.get(`/api/product_modules/${id}`).then(response => {
                this.projectModules = response.data;
            });
        },

        getIndependentTask() {
            this.tasks = [];
            this.finalSelectedTask = [];

            axios.get("/api/tasks/independent-task").then(res => {
                this.tasks = res.data.filter(
                    task => !this.existingId.includes(task.id)
                );
                this.allTasks = this.tasks.map(task => {
                    return { ...task, selectTasks: false };
                });
            });
        },
        getProject() {
            axios.get("/api/all_projects").then(res => {
                this.allProject = res.data;
            });
        },
        getProjectTask() {
            this.finalSelectedTask = [];
            this.getProjectModule(this.projectID);

            this.selectTask = [];
            axios.get(`/api/project/task/w/${this.projectID}`).then(res => {
                this.tasks = res.data.filter(
                    task => !this.existingId.includes(task.id)
                );
            });
            this.selectTask = [];
            axios.get(`/api/project/task/w/${this.projectID}`).then(res => {
                this.tasks = res.data.filter(
                    task => !this.existingId.includes(task.id)
                );
            });
        },
        getModuleTask() {
            this.finalSelectedTask = [];
            axios.get(`/api/module/task/w/${this.moduleId}`).then(res => {
                this.tasks = res.data.filter(
                    task => !this.existingId.includes(task.id)
                );
            });
        }
    },
    mounted() {
        this.getExistingTasksId();
        this.getProject();
        this.getIndependentTask();
    },

    components: {
        allTaskList,
        independentTaskForm
    }
};
</script>

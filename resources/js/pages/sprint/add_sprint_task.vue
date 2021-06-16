<template>
    <div>
        <div class="row " style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Add Sprint Task</h4>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Task Type</label>
                                    <div class="d-flex">
                                        <span class="mx-2">
                                            <div class="form-check">
                                                <label class="form-check-label">
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
                                                    @click="tasks = []"
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

                                <div
                                    v-if="task_category === 'independent_task'"
                                >
                                    <independentTaskForm
                                        :sprintID="this.$route.params.id"
                                        :users="allUsers"
                                    ></independentTaskForm>
                                </div>

                                <div v-if="task_category === 'module_task'">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="project_input"
                                                    >Project</label
                                                >
                                                <select
                                                    @change="getProjectTask()"
                                                    class="form-control"
                                                    name=""
                                                    v-model="projectID"
                                                    id="project_input"
                                                >
                                                    <option
                                                        selected
                                                        @click="form.tasks = []"
                                                        :value="-1"
                                                    >
                                                        Select Project
                                                    </option>
                                                    <option
                                                        v-for="(project,
                                                        index) in allProject"
                                                        :key="index"
                                                        :value="project.id"
                                                    >
                                                        {{ project.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div
                                                v-if="projectModules.length"
                                                class="form-group"
                                            >
                                                <label for="module_input"
                                                    >Module</label
                                                >
                                                <select
                                                    class="form-control"
                                                    name=""
                                                    @change="getModuleTask()"
                                                    id="module_input"
                                                    v-model="moduleId"
                                                >
                                                    <option selected :value="0"
                                                        >Select Module</option
                                                    >
                                                    <option
                                                        v-for="(projectModule,
                                                        index) in projectModules"
                                                        :key="index"
                                                        :value="
                                                            projectModule.id
                                                        "
                                                    >
                                                        {{ projectModule.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div v-if="tasks.length" class="col-12">
                                        <h5>Task List</h5>
                                    </div>
                                    <div class="row">
                                        <div
                                            class="col-4 mt-2"
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
                                                :finalSelectedTask="
                                                    finalSelectedTask
                                                "
                                                :exist="
                                                    existingId.includes(task.id)
                                                        ? true
                                                        : false
                                                "
                                            ></allTaskList>
                                        </div>
                                        <div
                                            class="col-12 mt-2"
                                            v-if="finalSelectedTask"
                                        >
                                            <button
                                                class=" btn btn-primary"
                                                @click="updateSprintTask()"
                                            >
                                                Update Sprint Task
                                            </button>
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
            projectModules: [],
            task_category: "independent_task",
            projectID: -1,
            allUsers: [],
            moduleId: 0,
            existingId: []
        };
    },
    methods: {
        getUsers() {
            axios.get("/api/all_users").then(res => {
                this.allUsers = res.data;
            });
        },
        getExistingTasksId() {
            axios.get(`/api/sprint/${this.$route.params.id}`).then(response => {
                // if (this.existingId.length) {
                this.existingId = response.data.sprint_task.map(
                    task => task.task_id
                );
                this.finalSelectedTask = response.data.sprint_task;
                console.log(this.finalSelectedTask, "Kholo kholo dhar");
                // }
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
                    this.$router.push({
                        name: "sprint_details",
                        params: { id: this.spritnID }
                    });
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

        // getIndependentTask() {
        //     this.tasks = [];
        //     this.finalSelectedTask = [];

        //     axios.get("/api/tasks/independent-task").then(res => {
        //         this.tasks = res.data.filter(
        //             task => !this.existingId.includes(task.id)
        //         );
        //         this.allTasks = this.tasks.map(task => {
        //             return { ...task, selectTasks: false };
        //         });
        //     });
        // },
        getProject() {
            axios.get("/api/all_projects").then(res => {
                this.allProject = res.data;
            });
        },
        getProjectTask() {
            this.allTasks = [];
            // this.finalSelectedTask = [];
            this.getProjectModule(this.projectID);

            this.selectTask = [];
            axios.get(`/api/project/task/w/${this.projectID}`).then(res => {
                this.tasks = res.data;
            });
            this.selectTask = [];
            axios.get(`/api/project/task/w/${this.projectID}`).then(res => {
                this.tasks = res.data;
            });
        },
        getModuleTask() {
            this.allTasks = [];
            // this.finalSelectedTask = [];
            axios.get(`/api/module/task/w/${this.moduleId}`).then(res => {
                this.tasks = res.data;
            });
        }
    },
    mounted() {
        this.getExistingTasksId();
        this.getProject();
        this.getUsers();
    },

    components: {
        allTaskList,
        independentTaskForm
    }
};
</script>

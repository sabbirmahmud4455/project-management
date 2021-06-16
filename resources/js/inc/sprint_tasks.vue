<template>
    <div>
        <div
            class="card "
            :class="form.selectTasks ? 'border border-success' : ''"
        >
            <div class="card-body">
                <div class="form-group">
                    <input
                        v-model="form.selectTasks"
                        :value="task.id"
                        type="checkbox"
                        name=""
                        :id="'task' + task.id"
                        :checked="true"
                        @change="taskChecked($event)"
                    />
                    <label class="ml-1" :for="'task' + task.id">{{
                        task.name
                    }}</label>
                </div>

                <div class="form-group">
                    <label for="">Priority</label>
                    <div class="d-flex">
                        <span class="mx-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        :name="'priority' + task.id"
                                        v-model="form.priority"
                                        value="Low"
                                        @click="taskChecked($event)"
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
                                        :name="'priority' + task.id"
                                        v-model="form.priority"
                                        value="Medium"
                                        @click="taskChecked($event)"
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
                                        :name="'priority' + task.id"
                                        v-model="form.priority"
                                        value="High"
                                        @click="taskChecked($event)"
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
                        v-model="form.assign_to"
                        class="form-control"
                        @change="taskChecked($event)"
                        name=""
                        id=""
                    >
                        <option :value="null">Select Member</option>
                        <option
                            class="w-100"
                            v-for="(user, index) in users"
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
</template>
<script>
export default {
    props: [
        "task",
        "users",
        "index",
        "updateAllTask",
        "sprint",
        "exist",
        "allTaskList",
        "finalSelectedTask"
    ],
    data() {
        return {
            form: {
                sprint_id: this.sprint,
                task_id: this.task.id,
                assign_to: this.exist
                    ? this.finalSelectedTask.filter(
                          task => task.task_id == this.task.id
                      )[0].assign_to
                    : null,
                priority: this.exist
                    ? this.finalSelectedTask.filter(
                          task => task.task_id == this.task.id
                      )[0].priority
                    : null,
                selectTasks: this.exist
            }
        };
    },
    methods: {
        taskChecked() {
            console.log("here");
            this.updateAllTask(this.index, this.form);
            //this.form
        }
    }
};
</script>
<style lang=""></style>

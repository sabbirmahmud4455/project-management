<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <input
                        v-model="form.selectTasks"
                        :value="task.id"
                        type="checkbox"
                        name=""
                        :id="'task' + task.id"
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
    props: ["task", "users", "index", "updateAllTask", "sprint"],
    data() {
        return {
            form: {
                sprintID: this.sprint,
                taskId: this.task.id,
                asigneTo: null,
                priority: null,
                selectTasks: null
            }
        };
    },
    methods: {
        taskChecked() {
            this.updateAllTask(this.index, this.form);
            //this.form
        }
    }
};
</script>
<style lang=""></style>

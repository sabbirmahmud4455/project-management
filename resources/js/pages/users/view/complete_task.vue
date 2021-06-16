<template lang="">
    <div class="col-12" style="overflow: auto">
        <table class="table" id="sampleTable">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Priority</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-if="completedTask"
                    v-for="(comTask, index) in completedTask"
                    :key="index"
                >
                    <td>{{ index + 1 }}</td>
                    <td>{{ comTask.task.name }}</td>
                    <td>{{ comTask.priority }}</td>
                    <td>
                        {{ comTask.status }}
                    </td>
                </tr>
                <div v-if="!completedTask" class="d-block">
                    <h5 class="py-2 text-center text-muted">Data Not Found</h5>
                </div>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props: ["completedTask"]
};
</script>

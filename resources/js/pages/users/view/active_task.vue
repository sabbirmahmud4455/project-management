<template lang="">
    <div class="col-12">
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
                    v-if="activeTask"
                    v-for="(aTask, index) in activeTask"
                    :key="index"
                >
                    <td>{{ index + 1 }}</td>
                    <td>{{ aTask.task.name }}</td>
                    <td>{{ aTask.priority }}</td>
                    <td>
                        {{ aTask.status }}
                    </td>
                </tr>
                <div v-if="!activeTask.length" class="col-12">
                    <h5 class="py-2 text-center text-muted">Data Not Found</h5>
                </div>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props: ["activeTask"]
};
</script>

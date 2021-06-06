<template lang="">
    <div class="col-12">
        <div class="row">
            <div
                class="col-6"
                v-if="completedTask"
                v-for="(comTask, index) in completedTask"
                :key="index"
            >
                <div class="timeline-post">
                    <div class="post-media">
                        <div class="content">
                            <h5>
                                <a href="#">{{ comTask.task.name }}</a>
                            </h5>
                            <p class="text-muted">
                                <small>2 January at 9:30</small>
                            </p>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="card-body">
                            <h6>
                                <span>
                                    <router-link
                                        :to="{
                                            name: 'task_view',
                                            params: { id: comTask.task.id }
                                        }"
                                        class=" text-dark"
                                    >
                                        {{ comTask.task.name }}
                                    </router-link>
                                </span>
                            </h6>
                            <h5>
                                <span>
                                    <router-link
                                        :to="{
                                            name: 'task_view',
                                            params: { id: comTask.task.id }
                                        }"
                                        class=" text-dark"
                                    >
                                        {{ comTask.task.name }}
                                    </router-link>
                                </span>
                            </h5>
                            <span class=" bg-primary px-2">{{
                                comTask.status
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!completedTask.length" class="col-12">
                <h5 class="py-2 text-center text-muted">Data Not Found</h5>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["completedTask"]
};
</script>

<template lang="">
    <div class="col-12">
        <div class="row">
            <div
                class="col-6"
                v-if="activeTask.length"
                v-for="(activTask, index) in activeTask"
                :key="index"
            >
                <div class="timeline-post">
                    <div class="post-media">
                        <div class="content">
                            <h5>
                                <a href="#">{{ activTask.task.name }}</a>
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
                                            params: { id: activTask.task.id }
                                        }"
                                        class=" text-dark"
                                    >
                                        {{ activTask.task.name }}
                                    </router-link>
                                </span>
                            </h6>
                            <h5>
                                <span>
                                    <router-link
                                        :to="{
                                            name: 'task_view',
                                            params: { id: activTask.task.id }
                                        }"
                                        class=" text-dark"
                                    >
                                        {{ activTask.task.name }}
                                    </router-link>
                                </span>
                            </h5>
                            <span class=" bg-primary px-2">{{
                                activTask.status
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!activeTask.length" class="col-12">
                <h5 class="py-2 text-center text-muted">Data Not Found</h5>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["activeTask"]
};
</script>

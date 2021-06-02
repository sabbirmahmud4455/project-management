<template lang="">
    <div></div>
</template>
<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            tasks: {}
        };
    },
    methods: {
        getTask(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            axios
                .get(`/api/project/task/${this.id}?page=` + page)
                .then(response => {
                    this.tasks = response.data;
                });
        }
    },
    mounted() {
        this.getTask();
    }
};
</script>

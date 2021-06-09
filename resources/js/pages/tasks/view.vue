<template lang="">
    <div>




        <div class="row " style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Project Update</h4>
                            <ul
                                        class="list-group list-group-unbordered mb-3"
                                    >
                                        <li class="list-group-item">
                                            <b>Name :</b>
                                            <span v-if="name" class="ml-2">{{
                                                name
                                            }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Project :</b>
                                            <span
                                                v-if="project_name"
                                                class="ml-2"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'project_view',
                                                        params: {
                                                            id: project_id
                                                        }
                                                    }"
                                                    class=" text-primary"
                                                >
                                                    {{ project_name }}
                                                </router-link>
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Module :</b>
                                            <span
                                                v-if="module_name"
                                                class="ml-2"
                                            >
                                                <router-link
                                                    :to="{
                                                        name: 'module_view',
                                                        params: {
                                                            id: module_id
                                                        }
                                                    }"
                                                    class=" text-primary"
                                                >
                                                    {{ module_name }}
                                                </router-link>
                                            </span>
                                        </li>

                                        <br />
                                        <li class="list-group-item">
                                            <b class="d-block">Description</b>
                                            <div
                                                v-if="description"
                                                v-html="description"
                                            ></div>
                                        </li>
                                    </ul>


                           
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            title: "",
            project_name: "",
            project_id: "",
            module_name: "",
            module_id: "",
            description: ""
        };
    },
    methods: {
        getUser() {
            let id = this.$route.params.id;
            axios.get(`/api/task/${id}`).then(response => {
                this.name = response.data[0].name;
                this.title = response.data[0].title;
                this.description = response.data[0].description;
                if (response.data[0].project) {
                    this.project_name = response.data[0].project.name;
                    this.project_id = response.data[0].project.id;
                }
                if (response.data[0].module) {
                    this.module_name = response.data[0].module.name;
                    this.module_id = response.data[0].module.id;
                }
            });
        }
    },
    mounted() {
        this.getUser();
    }
};
</script>

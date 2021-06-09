<template lang="">
    <div>
        <div class="row " style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="details_col">
                                    <h4 class="title">Project Update</h4>
                                    <div class="">
                                        <div class="text-center">
                                            <img
                                                v-if="photo.length"
                                                class="img-fluid"
                                                :src="photo"
                                                alt="Project main picture"
                                            />
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="name.length"
                                                class="propraty_title"
                                            >
                                                name
                                            </p>
                                            <p class="value">
                                                {{ name }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="type.length"
                                                class="propraty_title"
                                            >
                                                Type
                                            </p>
                                            <p class="value">
                                                {{ type }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="start_date"
                                                class="propraty_title"
                                            >
                                                Start Date
                                            </p>
                                            <p class="value">
                                                {{ start_date }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="end_date"
                                                class="propraty_title"
                                            >
                                                End Date
                                            </p>
                                            <p class="value">
                                                {{ end_date }}
                                            </p>
                                        </div>

                                        <div class="info_propraty">
                                            <p
                                                v-if="development_cost"
                                                class="propraty_title"
                                            >
                                                Development Cost
                                            </p>
                                            <p class="value">
                                                {{ development_cost }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="details_col">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <router-link
                                                        :to="{
                                                            name:
                                                                'project_view',
                                                            params: { id: id }
                                                        }"
                                                        class="nav-link"
                                                        active-class="active"
                                                        >Modules</router-link
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <router-link
                                                        :to="{
                                                            name:
                                                                'project_view_tasks',
                                                            params: { id: id }
                                                        }"
                                                        class="nav-link"
                                                        active-class="active"
                                                        >Tasks</router-link
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <router-link
                                                        :to="{
                                                            name:
                                                                'project_view_details',
                                                            params: { id: id }
                                                        }"
                                                        class="nav-link"
                                                        active-class="active"
                                                        >Details</router-link
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- vue route view -->
                                                <router-view></router-view>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div>
                                        <!-- /.card-body -->
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
export default {
    data() {
        return {
            id: this.$route.params.id,
            client_id: 0,
            name: "",
            type: "",
            photo: "",
            start_date: null,
            end_date: null,
            development_cost: ""
        };
    },
    methods: {
        getUser() {
            let id = this.$route.params.id;
            axios.get(`/api/project/${id}`).then(response => {
                this.name = response.data.name;
                this.client_id = response.data.client_id;
                this.type = response.data.type;
                this.start_date = response.data.start_date;
                this.end_date = response.data.end_date;
                this.development_cost = response.data.development_cost;
                this.photo = response.data.photo;
            });
        }
    },
    mounted() {
        this.getUser();
    }
};
</script>
<style lang=""></style>

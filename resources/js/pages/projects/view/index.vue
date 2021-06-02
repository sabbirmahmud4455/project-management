<template lang="">
    <div>
        <div class="content-wrapper" style="min-height: 1416.81px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Project Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        Home
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'projects' }">
                                        Projects
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active">
                                    Project Details
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img
                                            v-if="photo.length"
                                            class="img-fluid"
                                            :src="photo"
                                            alt="Project main picture"
                                        />
                                    </div>

                                    <h3
                                        v-if="name.length"
                                        class="profile-username text-center"
                                    >
                                        {{ name }}
                                    </h3>

                                    <ul
                                        class="list-group list-group-unbordered mb-3"
                                    >
                                        <li class="list-group-item">
                                            <b>Type</b>
                                            <span
                                                v-if="type.length"
                                                class="float-right"
                                                >{{ type }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Start Date</b>
                                            <span
                                                class="float-right"
                                                v-if="start_date"
                                                >{{ start_date }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>End Date</b>
                                            <span
                                                class="float-right"
                                                v-if="end_date"
                                            >
                                                {{ end_date }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Dev Cost</b>
                                            <span
                                                v-if="development_cost > 0"
                                                class="float-right"
                                                ><i
                                                    class="fas fa-dollar-sign    "
                                                ></i>
                                                {{ development_cost }}</span
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <router-link
                                                :to="{
                                                    name: 'project_view',
                                                    params: { id: id }
                                                }"
                                                class="nav-link"
                                                active-class="active "
                                                >Status</router-link
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <router-link
                                                :to="{
                                                    name: 'project_view_module',
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
                                                    name: 'project_view_tasks',
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
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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

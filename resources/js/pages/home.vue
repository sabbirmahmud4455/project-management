<template>
    <div>
        <div class="row " style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="details_col">
                            <h4 class="title">Dashboard</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <!-- <i class="icon fa fa-users "></i> -->
                                        <i
                                            class="ri-user-3-line icon fa-3x"
                                        ></i>
                                        <div class="info">
                                            <h4>Users</h4>
                                            <p>
                                                <b>{{ users }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i
                                            class="icon ri-profile-line fa-3x"
                                        ></i>
                                        <div class="info">
                                            <h4>Active Project</h4>
                                            <p>
                                                <b>{{ activeProject }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i
                                            class="icon ri-profile-line fa-3x"
                                        ></i>
                                        <div class="info">
                                            <h4>Completed Project</h4>
                                            <p>
                                                <b>{{ completeProject }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i
                                            class="icon ri-stackshare-line fa-3x"
                                        ></i>

                                        <div class="info">
                                            <h4>Active Module</h4>
                                            <p>
                                                <b>{{ activeModule }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i
                                            class="icon ri-stackshare-line fa-3x"
                                        ></i>

                                        <div class="info">
                                            <h4>Complete Module</h4>
                                            <p>
                                                <b>{{ completeModule }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i class="icon ri-task-line fa-3x"></i>
                                        <div class="info">
                                            <h4>Active Task</h4>
                                            <p><b>5</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i class="icon ri-task-line fa-3x"></i>
                                        <div class="info">
                                            <h4>Completed Task</h4>
                                            <p><b>5</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i class="icon ri-flow-chart fa-3x"></i>
                                        <div class="info">
                                            <h4>Sprint</h4>
                                            <p><b>5</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget-small primary">
                                        <i class="icon ri-task-line fa-3x"></i>
                                        <div class="info">
                                            <h4>Completed Task</h4>
                                            <p><b>5</b></p>
                                        </div>
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
            users: null,
            activeProject: 0,
            completeProject: 0,
            activeModule: 0,
            completeModule: 0
        };
    },
    methods: {
        getUsers() {
            axios.get("/api/all_users").then(res => {
                this.users = res.data.length;
            });
        },
        getProjects() {
            axios.get("/api/all_projects").then(res => {
                var responseData = res.data;
                var activeProjectArr = responseData.filter(
                    item => item.status === "Active"
                );
                this.activeProject = activeProjectArr.length;
                var completeProjectArr = responseData.filter(
                    item => item.status === "Complete"
                );
                this.completeProject = completeProjectArr.length;
            });
        },
        getModules() {
            axios.get("/api/module").then(res => {
                var responseData = res.data;
                var activeModuleArr = responseData.filter(
                    item => item.status === "Active"
                );
                this.activeModule = activeModuleArr.length;
                var completeModuleArr = responseData.filter(
                    item => item.status === "Complete"
                );
                this.completeModule = completeModuleArr.length;
            });
        }
    },
    mounted() {
        this.getUsers();
        this.getProjects();
        this.getModules();
    }
};
</script>
<style lang=""></style>

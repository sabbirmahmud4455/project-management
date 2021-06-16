<template lang="">
    <div>
        <div class="row user" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="details_col">
                                    <div
                                        class="user-img d-flex justify-content-center"
                                    >
                                        <img
                                            style="width: 70px;"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg"
                                            v-if="user.photo"
                                            :src="user.photo"
                                            alt="User Profile picture"
                                        />
                                    </div>
                                    <h5
                                        v-if="user.name"
                                        class="mt-2 profile-username text-center"
                                    >
                                        {{ user.name }}
                                    </h5>

                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Email
                                        </p>
                                        <p class="value" user.email>
                                            {{ user.name }}
                                        </p>
                                    </div>

                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Email
                                        </p>
                                        <p class="value" user.email>
                                            {{ user.email }}
                                        </p>
                                    </div>

                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Contact No
                                        </p>
                                        <p class="value" v-if="user.contact_no">
                                            {{ user.contact_no }}
                                        </p>
                                    </div>

                                    <div class="info_propraty">
                                        <p class="propraty_title">
                                            Gender
                                        </p>
                                        <p class="value" v-if="user.gender">
                                            {{ user.gender }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" style="padding-left: 5px;">
                                <div class="details_col">
                                    <div class="card">
                                        <div class="card-header">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link active"
                                                        href="#user-active-tasks"
                                                        data-toggle="tab"
                                                        >Active Tasks</a
                                                    >
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link "
                                                        href="#user-complete-tasks"
                                                        data-toggle="tab"
                                                        >complete Tasks</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div
                                                    class="tab-pane active "
                                                    id="user-active-tasks"
                                                >
                                                    <div
                                                        class="tile user-settings"
                                                    >
                                                        <div class="row">
                                                            <userActiveTask
                                                                :activeTask="
                                                                    user.active_sprint_tasks
                                                                "
                                                            ></userActiveTask>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="tab-pane fade"
                                                    id="user-complete-tasks"
                                                >
                                                    <div
                                                        class="tile user-settings"
                                                    >
                                                        <div class="row">
                                                            <userCompetedTask
                                                                :completedTask="
                                                                    user.closed_sprint_tasks
                                                                "
                                                            ></userCompetedTask>
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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import userActiveTask from "./active_task";
import userCompetedTask from "./complete_task";
export default {
    data() {
        return {
            id: this.$route.params.id,
            user: [],

            name: "",
            bio: "",
            email: "",
            contact_no: "",
            type: "",
            gender: "",
            photo: "",
            skills: [],
            nid: "",
            date_of_birth: "",
            present_address: "",
            permanent_address: "",
            emergency_contact_person: ""
        };
    },
    methods: {
        getUser() {
            let id = this.$route.params.id;
            axios.get(`/api/user/${id}`).then(response => {
                this.user = response.data;
            });
        }
    },
    mounted() {
        this.getUser();
    },
    components: {
        userActiveTask,
        userCompetedTask
    }
};
</script>

<template lang="">
    <div>
        <div class="row user" style="margin: 0px -30px;">
            <div class="col-md-12 px-0">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12 details_col">
                                <div class="profile ">
                                    <div class="info">
                                        <img
                                            class="user-img"
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg"
                                            v-if="user.photo"
                                            :src="user.photo"
                                            alt="User Profile picture"
                                        />
                                        <h3
                                            v-if="user.name"
                                            class="mt-2 profile-username text-center"
                                        >
                                            {{ user.name }}
                                        </h3>
                                        <p v-if="user.types">
                                            <span
                                                v-for="(type,
                                                index) in user.types"
                                                :key="index"
                                                >{{ type.name }}</span
                                            >
                                        </p>
                                    </div>
                                    <div class="cover-image"></div>
                                </div>
                            </div>
                            <div class="col-md-3 details_col">
                                <div class="tile">
                                    <ul
                                        class="nav flex-column nav-tabs user-tabs"
                                    >
                                        <!-- <li class="nav-item">
                            <a
                                class="nav-link active"
                                href="#user-timeline"
                                data-toggle="tab"
                                >Timeline</a
                            >
                        </li> -->
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
                                        <li class="nav-item">
                                            <a
                                                class="nav-link"
                                                href="#user-settings"
                                                data-toggle="tab"
                                                >Settings</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9 details_col">
                                <div class="tab-content">
                                    <!-- <div class="tab-pane active" id="user-timeline">
                        <div class="timeline-post">
                            <div class="post-media">
                                <a href="#"
                                    ><img
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                /></a>
                                <div class="content">
                                    <h5><a href="#">John Doe</a></h5>
                                    <p class="text-muted">
                                        <small>2 January at 9:30</small>
                                    </p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis tion ullamco
                                    laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla pariatur. Excepteur
                                    sint occaecat cupidatat non proident, sunt
                                    in culpa qui officia deserunt mollit anim id
                                    est laborum.
                                </p>
                            </div>
                            <ul class="post-utility">
                                <li class="likes">
                                    <a href="#"
                                        ><i
                                            class="fa fa-fw fa-lg fa-thumbs-o-up"
                                        ></i
                                        >Like</a
                                    >
                                </li>
                                <li class="shares">
                                    <a href="#"
                                        ><i class="fa fa-fw fa-lg fa-share"></i
                                        >Share</a
                                    >
                                </li>
                                <li class="comments">
                                    <i class="fa fa-fw fa-lg fa-comment-o"></i>
                                    5 Comments
                                </li>
                            </ul>
                        </div>
                    </div> -->
                                    <div
                                        class="tab-pane fade"
                                        id="user-settings"
                                    >
                                        <div class="tile user-settings">
                                            <h4 class="line-head">Settings</h4>

                                            <UserSetting></UserSetting>
                                        </div>
                                    </div>
                                    <div
                                        class="tab-pane active "
                                        id="user-active-tasks"
                                    >
                                        <div class="tile user-settings">
                                            <h4 class="line-head">
                                                Active Task
                                            </h4>

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
                                        <div class="tile user-settings">
                                            <h4 class="line-head">
                                                completed Task
                                            </h4>

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
</template>
<script>
import userActiveTask from "./active_task";
import userCompetedTask from "./complete_task";
import UserSetting from "./user_setting";
export default {
    data() {
        return {
            id: this.$route.params.id,
            user: null,
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
        UserSetting,
        userActiveTask,
        userCompetedTask
    }
};
</script>

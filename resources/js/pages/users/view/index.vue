<template lang="">
    <div>
        <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg"  v-if="user.photo"  :src="user.photo"  alt="User Profile picture">
              <h3     v-if="user.name"       class="mt-2 profile-username text-center"
                                    >
                                        {{ user.name }}
                                    </h3>
              <p v-if="user.types">
                  <span v-for="(type, index) in user.types" :key="index">{{type.name}}</span>
              </p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-active-tasks" data-toggle="tab">Active Tasks</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-complite-tasks" data-toggle="tab">Complite Tasks</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>

            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>
              </div>
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>

                    <UserSetting></UserSetting>



              </div>
            </div>
            <div class="tab-pane fade" id="user-active-tasks">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>

                    <div class="row">
                        <div class="col-6">
                            <div class="timeline-post"><div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a> <div class="content"><h5><a href="#">John Doe</a></h5> <p class="text-muted"><small>2 January at 9:30</small></p></div></div> <div class="post-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div> <ul class="post-utility"><li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li> <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li> <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li></ul></div>
                        </div>
                        <div class="col-6">
                            <div class="timeline-post"><div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a> <div class="content"><h5><a href="#">John Doe</a></h5> <p class="text-muted"><small>2 January at 9:30</small></p></div></div> <div class="post-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div> <ul class="post-utility"><li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li> <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li> <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li></ul></div>
                        </div>
                        <div class="col-6">
                            <div class="timeline-post"><div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a> <div class="content"><h5><a href="#">John Doe</a></h5> <p class="text-muted"><small>2 January at 9:30</small></p></div></div> <div class="post-content"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div> <ul class="post-utility"><li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li> <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li> <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li></ul></div>
                        </div>
                    </div>



              </div>
            </div>
            <div class="tab-pane fade" id="user-complite-tasks">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>

                    Completed tasks



              </div>
            </div>
          </div>
        </div>
      </div>





















        <!-- <div class="content-wrapper" style="min-height: 1416.81px;"> -->
            <!-- Content Header (Page header) -->
            <!-- <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        Home
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'users' }">
                                        Users
                                    </router-link>
                                </li>

                                <li class="breadcrumb-item active">
                                    User Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div> -->
                <!-- /.container-fluid -->
            <!-- </section> -->

            <!-- Main content -->
            <!-- <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <!-- <div class="card card-primary card-outline">
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
                                        class="mt-2 profile-username text-center"
                                    >
                                        {{ name }}
                                    </h3>

                                    <p
                                        v-if="bio"
                                        class="text-muted text-center"
                                    >
                                        {{ bio }}
                                    </p>

                                    <ul
                                        class="list-group list-group-unbordered mb-3"
                                    >
                                        <li class="list-group-item"> -->
                                            <!-- <b>Type</b> -->
                                            <!-- <span
                                                v-if="types"
                                                class="float-right"
                                                >{{ type }}</span
                                            > -->
                                        <!-- </li>
                                        <li class="list-group-item">
                                            <b>Email</b>
                                            <span
                                                v-if="email"
                                                class="float-right"
                                                >{{ email }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Contact</b>
                                            <span
                                                v-if="contact_no"
                                                class="float-right"
                                                >{{ contact_no }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Contact (Other)</b>
                                            <span
                                                v-if="emergency_contact_person"
                                                class="float-right"
                                                >{{
                                                    emergency_contact_person
                                                }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Gender</b>
                                            <span
                                                v-if="gender"
                                                class="float-right"
                                                >{{ gender }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nid No</b>
                                            <span
                                                v-if="nid"
                                                class="float-right"
                                                >{{ nid }}</span
                                            >
                                        </li>
                                        <li class="list-group-item">
                                            <b>Date of birth</b>
                                            <span
                                                v-if="date_of_birth"
                                                class="float-right"
                                                >{{ date_of_birth }}</span
                                            >
                                        </li>
                                        <br />
                                        <li class="list-group-item">
                                            <b class="d-block"
                                                >Present Address </b
                                            ><span v-if="present_address">{{
                                                present_address
                                            }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="d-block"
                                                >permanent Address </b
                                            ><span v-if="permanent_address">{{
                                                permanent_address
                                            }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b class="d-block">Skills</b>
                                            <span
                                                v-if="skills"
                                                class="mx-1 badge badge-primary"
                                                v-for="(skill, index) in skills"
                                                :key="index"
                                                >{{ skill.name }}</span
                                            >
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- /.card-body -->
                            <!-- </div> -->
                            <!-- /.card -->
                        <!-- </div> -->
                        <!-- /.col -->
                        <!-- <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <router-link
                                                :to="{
                                                    name: 'user_profile',
                                                    params: { id: id }
                                                }"
                                                class="nav-link"
                                                active-class="active "
                                                >Active Task</router-link
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <router-link
                                                :to="{
                                                    name:
                                                        'user_view_complete_task',
                                                    params: { id: id }
                                                }"
                                                class="nav-link"
                                                active-class="active"
                                                >Complete Task</router-link
                                            >
                                        </li>
                                        <li class="nav-item">
                                            <router-link
                                                :to="{
                                                    name: 'user_view_details',
                                                    params: { id: id }
                                                }"
                                                class="nav-link"
                                                active-class="active"
                                                >Details</router-link
                                            >
                                        </li>
                                    </ul>
                                </div> -->
                                <!-- /.card-header -->
                                <!-- <div class="card-body">
                                    <div class="tab-content"> -->
                                        <!-- vue route view -->
                                        <!-- <router-view></router-view> -->
                                    <!-- </div> -->
                                    <!-- /.tab-content -->
                                <!-- </div> -->
                                <!-- /.card-body -->
                            <!-- </div> -->
                            <!-- /.nav-tabs-custom -->
                        <!-- </div> -->
                        <!-- /.col -->
                    <!-- </div> -->
                    <!-- /.row -->
                <!-- </div> -->
                <!-- /.container-fluid -->
            <!-- </section> -->
            <!-- /.content -->
        <!-- </div> -->
    </div>
</template>
<script>
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
      emergency_contact_person: "",
    };
  },
  methods: {
    getUser() {
      let id = this.$route.params.id;
      axios.get(`/api/user/${id}`).then((response) => {
        this.user = response.data;
        // this.name = response.data[0].name;
        // this.email = response.data[0].email;
        // this.type = response.data[0].type;
        // this.contact_no = response.data[0].contact_no;
        // this.gender = response.data[0].gender;
        // this.photo = response.data[0].photo;
        // this.bio= response.data[0].profile.bio;

        if (response.data[0].profile) {
          this.skills = JSON.parse(response.data[0].profile.skills);

          this.bio = response.data[0].profile.bio;
          this.nid = response.data[0].profile.nid;
          this.date_of_birth = response.data[0].profile.date_of_birth;
          this.present_address = response.data[0].profile.present_address;
          this.permanent_address = response.data[0].profile.permanent_address;
          this.emergency_contact_person =
            response.data[0].profile.emergency_contact_person;
        }
      });
    },
  },
  mounted() {
    this.getUser();
  },
  components: {
    UserSetting,
  },
};
</script>

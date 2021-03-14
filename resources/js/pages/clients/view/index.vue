<template lang="">
    <div>
        <div class="content-wrapper" style="min-height: 1416.81px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Client Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
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
                            <img v-if="photo.length" class="img-fluid" :src="photo" alt="Project main picture">
                        
                        </div>

                        <h3 v-if="name.length" class="mt-2 profile-username text-center">{{name}}</h3>

                        
                        <ul class="list-group list-group-unbordered mb-3">
                        
                       
                        <li class="list-group-item">
                            <b>Email</b> <span v-if="email" class="float-right">{{email}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Contact</b> <span v-if="contact_no" class="float-right">{{contact_no}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Contact (Other)</b> <span v-if="emergency_contact_person" class="float-right">{{emergency_contact_person}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Gender</b> <span v-if="gender" class="float-right">{{gender}}</span>
                        </li>
                        
                        <br>
                        <li class="list-group-item">
                            <b class='d-block'>Address </b><span v-if="address">{{address}}</span>
                        </li>
                        <li class="list-group-item">
                            <b class='d-block'>Details </b>
                            <div v-if="details" v-html="details"></div>
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
                                    <router-link  :to="{name:'client_profile', params:{id: id}}" class="nav-link" active-class="active ">Active Projects</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{name:'client_view_pending_project', params:{id: id}}" class="nav-link" active-class="active ">Pending Projects</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{name:'client_view_complete_project', params:{id: id}}" class="nav-link" active-class="active">Complete Projects</router-link>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                
                                 <!-- vue route view -->
                                <router-view></router-view>

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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
            name: '',
            email: '',
            contact_no: '',
            emergency_contact_person: '',
            gender: '',
            photo: '',
            address: '',
            details: '',
            
        }
    },
    methods:{
        getUser(){
            let id = this.$route.params.id;
            axios.get(`/api/client/${id}`)
            .then(response => {
                this.name= response.data.name;
                this.email= response.data.email;
                this.contact_no= response.data.contact_no;
                this.emergency_contact_person= response.data.emergency_contact_person;
                this.gender= response.data.gender;
                this.photo= response.data.photo;
                this.address= response.data.address;
                this.details= response.data.details;
                this.status= response.data.status;

                
                
                
        })
      },
    },
    mounted(){
        this.getUser();
    }
}
</script>
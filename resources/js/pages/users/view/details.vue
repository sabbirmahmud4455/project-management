<template lang="">
    <div>
        <div class="tab-pane container mt-3" id="settings">
            <form v-if="form.id" @submit.prevent="updateProfile()" @keydown="form.onKeydown($event)">
                <div class="card-body row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label >Date of birth</label>
                            <div class="form-control">
                                <VueDatePicker v-model="form.date_of_birth" placeholder="Choose date" clearable />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="national_id">National ID No</label>
                            <input v-model="form.nid" id="national_id" type="text" name="nid" class="form-control" placeholder="Enter National ID" :class="{ 'is-invalid': form.errors.has('nid') }">
                            <has-error :form="form" field="nid"></has-error>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="emergency_contact_person"> Emergency contact (Other person)</label>
                            <input v-model="form.emergency_contact_person" id="emergency_contact_person" type="text" name="emergency_contact_person" class="form-control" placeholder="Enter Permanent Address" :class="{ 'is-invalid': form.errors.has('emergency_contact_person') }">
                            <has-error :form="form" field="emergency_contact_person"></has-error>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <input v-model="form.bio" id="bio" type="text" name="bio" class="form-control" placeholder="Enter Bio" :class="{ 'is-invalid': form.errors.has('bio') }">
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="present_address">Present Address</label>
                            <input v-model="form.present_address" id="present_address" type="text" name="present_address" class="form-control" placeholder="Enter Present Address" :class="{ 'is-invalid': form.errors.has('present_address') }">
                            <has-error :form="form" field="present_address"></has-error>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="permanent_address">Permanent Address</label>
                            <input v-model="form.permanent_address" id="permanent_address" type="text" name="permanent_address" class="form-control" placeholder="Enter Permanent Address" :class="{ 'is-invalid': form.errors.has('permanent_address') }">
                            <has-error :form="form" field="permanent_address"></has-error>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <multiselect v-model="skills" tag-placeholder="Add this as new skill" placeholder="Search or add a skill" label="name" track-by="name" :options="options" :multiple="true" :taggable="true"></multiselect>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    
            </form>
            <form v-else @submit.prevent="createProfile()" @keydown="form.onKeydown($event)">
                <div class="card-body row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label >Date of birth</label>
                            <div class="form-control">
                                <VueDatePicker v-model="form.date_of_birth" placeholder="Choose date" clearable />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="national_id">National ID No</label>
                            <input v-model="form.nid" id="national_id" type="text" name="nid" class="form-control" placeholder="Enter National ID" :class="{ 'is-invalid': form.errors.has('nid') }">
                            <has-error :form="form" field="nid"></has-error>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="emergency_contact_person"> Emergency contact (Other person)</label>
                            <input v-model="form.emergency_contact_person" id="emergency_contact_person" type="text" name="emergency_contact_person" class="form-control" placeholder="Enter Permanent Address" :class="{ 'is-invalid': form.errors.has('emergency_contact_person') }">
                            <has-error :form="form" field="emergency_contact_person"></has-error>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <input v-model="form.bio" id="bio" type="text" name="bio" class="form-control" placeholder="Enter Bio" :class="{ 'is-invalid': form.errors.has('bio') }">
                            <has-error :form="form" field="bio"></has-error>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="present_address">Present Address</label>
                            <input v-model="form.present_address" id="present_address" type="text" name="present_address" class="form-control" placeholder="Enter Present Address" :class="{ 'is-invalid': form.errors.has('present_address') }">
                            <has-error :form="form" field="present_address"></has-error>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="permanent_address">Permanent Address</label>
                            <input v-model="form.permanent_address" id="permanent_address" type="text" name="permanent_address" class="form-control" placeholder="Enter Permanent Address" :class="{ 'is-invalid': form.errors.has('permanent_address') }">
                            <has-error :form="form" field="permanent_address"></has-error>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <multiselect v-model="skills" tag-placeholder="Add this as new skill" placeholder="Search or add a skill" label="name" track-by="name" :options="options" :multiple="true" :taggable="true"></multiselect>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</template>
<script>
import { Form } from 'vform'
import { VueDatePicker } from '@mathieustan/vue-datepicker';
import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';

 import Multiselect from 'vue-multiselect';

export default {
    data() {
        return {
            all_projects:[],
             value: [
                { name: 'Javascript', code: 'js' }
            ],
            options: [
                { name: 'Vue.js'},
                { name: 'Javascript'},
                { name: 'Open Source'}
            ],
            skills:[],
            form: new Form({
                id:'',
                date_of_birth: null,
                nid:'',
                bio:'',
                present_address:'',
                permanent_address:'',
                emergency_contact_person:'',
            })
        }
    },
    methods:{
        editProfile(){
            let id = this.$route.params.id;
            axios.get(`/api/profile/edit/${id}`)
            .then(response => {
                if (response.data[0]) {
                    this.form.id= response.data[0].id;
                    this.form.date_of_birth= response.data[0].date_of_birth;
                    this.form.bio= response.data[0].bio;
                    this.form.nid= response.data[0].nid;
                    this.skills=JSON.parse(response.data[0].skills)  ;
                    this.form.present_address= response.data[0].present_address;
                    this.form.permanent_address=response.data[0].permanent_address;
                    this.form.emergency_contact_person=response.data[0].emergency_contact_person;
                }
            })
        },
        updateProfile(){
        let id = this.$route.params.id;
        let skills_json = JSON.stringify(this.skills);
        let all= {'skills': skills_json, 'nid':this.form.nid, 'date_of_birth':this.form.date_of_birth, 'bio':this.form.bio, 'present_address':this.form.present_address, 'permanent_address':this.form.permanent_address, 'emergency_contact_person':this.form.emergency_contact_person}
        axios.put(`/api/profile/update/${id}`, all )
            .then(response => { 
                this.$toast.success({
                    title:'SUCCESS',
                    message:'Updated Successfully'
                })
        }).catch(error => {
                if (error.response.data.errors.nid) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.nid[0],
                  })
                }
                if (error.response.data.errors.date_of_birth) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.date_of_birth[0],
                  })
                }
            })
      },
      createProfile(){
        let id = this.$route.params.id;
        let skills_json = JSON.stringify(this.skills);
        let all= {'skills': skills_json, 'nid':this.form.nid, 'date_of_birth':this.form.date_of_birth, 'bio':this.form.bio, 'present_address':this.form.present_address, 'permanent_address':this.form.permanent_address, 'emergency_contact_person':this.form.emergency_contact_person}
        axios.post(`/api/profile/create/${id}`, all )
            .then(response => { 
                this.$toast.success({
                    title:'SUCCESS',
                    message:'Updated Successfully'
                })
        }).catch(error => {
                if (error.response.data.errors.nid) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.nid[0],
                  })
                }
                if (error.response.data.errors.date_of_birth) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.date_of_birth[0],
                  })
                }
            })
      }

    },
    mounted(){
       this.editProfile();
    },
    components : {
        VueDatePicker,
        Multiselect,
    },
    
    
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

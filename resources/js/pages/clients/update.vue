<template lang="">
    <div>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Client</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header d-flex">
                            <h3 class="card-title">Update Client</h3>
                        </div>
                        <!-- /.card-header -->
                        <form   @submit.prevent="updateclient()" @keydown="form.onKeydown($event)">
                            <div class="card-body row">
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="client_name">Name *</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="client_email">Email address</label>
                                        <input v-model="form.email" type="email" class="form-control" id="client_email" placeholder="Enter email" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="client_cell">Contact Number</label>
                                        <input v-model="form.contact_no" type="text" class="form-control" id="client_cell" placeholder="Enter Contact" :class="{ 'is-invalid': form.errors.has('contact_no') }">
                                        <has-error :form="form" field="contact_no"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="client_cell_other">Emergency Number(Other Person)</label>
                                        <input v-model="form.emergency_contact_person" type="text" class="form-control" id="client_cell_other" placeholder="Enter Contact" :class="{ 'is-invalid': form.errors.has('emergency_contact_person') }">
                                        <has-error :form="form" field="emergency_contact_person"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="inputStatus">Gender</label>
                                        
                                        <div class="form-check">
                                                <label class="form-check-label" style="min-width:80px">
                                                <input type="radio" class="form-check-input" value="Male" v-model="form.gender">
                                                Male
                                              </label>
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="Female"  v-model="form.gender">
                                                Female
                                              </label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="profilePhoto">Photo</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo" type="file" class="custom-file-input" id="profilePhoto" @change="onImageChange" :class="{ 'is-invalid': form.errors.has('photo') }">
                                            <label class="custom-file-label" for="profilePhoto">Choose file</label>
                                        </div>
                                        <button  v-if="real_time_photo.length > 0" @click="img_x" class="btn btn-light"><i class="fas fa-times"></i></button>
                                        <img v-if="real_time_photo.length > 0" style="max-width:35px; margin-left:2%; border-radius:5%;" :src="real_time_photo" alt="Client photo">
                                        <img v-else style="max-width:35px; margin-left:2%; border-radius:5%;" :src="real_photo" alt="Client photo">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input v-model="form.address" type="text" class="form-control" id="address" placeholder="Enter Address" :class="{ 'is-invalid': form.errors.has('address') }">
                                        <has-error :form="form" field="address"></has-error>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Details</label>
                                        <vue-editor v-model="form.details"/>
                                    </div>
                                </div>
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Client</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>
<script>
import { Form } from 'vform'
import { objectToFormData } from 'object-to-formdata'
export default {
    data() {
        return {
            real_time_photo:'',
            real_photo:'',

            form: new Form({
                name:'',
                email:'',
                contact_no:'',
                emergency_contact_person:'',
                address:'',
                gender:'Male',
                details:'<h4 class="text-muted">Client Details</h4>',
            }),
            img: new Form({
                photo: '',
            }),

            
        }
    },
    methods:{
        img_x(){
            document.getElementById('profilePhoto').value = '';
            this.real_time_photo=''
        },
        editclient(){
            let id = this.$route.params.id;

        axios.get(`/api/client/${id}/edit`)
            .then(response => {
                this.form.name= response.data.name;
                this.form.email= response.data.email;
                this.form.contact_no= response.data.contact_no;
                this.form.gender= response.data.gender;
                this.form.emergency_contact_person= response.data.emergency_contact_person;
                this.form.address= response.data.address;
                this.form.details= response.data.details;
                this.real_photo= response.data.photo;
        })
      },
      updateclient(){
          let id = this.$route.params.id;
          
            if (!this.img.photo=='') {
                this.img.post(`/api/clients/update/${id}`, {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }]
            })
            .then(response => { 
                console.log(response);
            }).catch(error => {
                if (error.response.data.errors.photo) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.photo[0],
                })
                }
            })
            }
          this.form.put(`/api/client/${id}`)
            .then(response => {
                this.$toast.success({
                    title:'SUCCESS',
                    message:'client Created Successfully'
                })
            }).catch(error => {
                if (error) {
                    if (error.response.data.errors.name) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.name[0],
                })
                }
                if (error.response.data.errors.email) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.email[0],
                })
                }
                if (error.response.data.errors.photo) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.photo[0],
                })
                }
                if (error.response.data.errors.password) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.password[0],
                })
                }
                if (error.response.data.errors.old_password) {
                this.$toast.error({
                title:'! ERRORS',
                message: error.response.data.errors.old_password[0],
                })
                }
                }
            })
      },
      
      //form img feld on chang
      onImageChange(event){

            //object to form data
            const file = event.target.files[0]
            // Do some client side validation...
            this.img.photo = file


            // show uploading file
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.real_time_photo = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        
        }

    },
    mounted(){
        this.editclient();
    }
    
}
</script>
<style lang="">

</style>
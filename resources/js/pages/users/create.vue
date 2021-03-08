<template lang="">
    <div>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create User</h1>
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
                            <h3 class="card-title">Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <form   @submit.prevent="createUser()" @keydown="form.onKeydown($event)">
                            <div class="card-body row">
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="user_name">Name *</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="user_email">Email address *</label>
                                        <input v-model="form.email" type="email" class="form-control" id="user_email" placeholder="Enter email" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="user_cell">Contact Number</label>
                                        <input v-model="form.contact_no" type="text" class="form-control" id="user_cell" placeholder="Enter Contact" :class="{ 'is-invalid': form.errors.has('contact_no') }">
                                        <has-error :form="form" field="contact_no"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="inputStatus">User Type</label>
                                        <select v-model="form.user_type" class="form-control custom-select" :class="{ 'is-invalid': form.errors.has('user_type') }">
                                        <option selected value="0">Member</option>
                                        <option value="1">Admin</option>
                                        </select>
                                        <has-error :form="form" field="user_type"></has-error>
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
                                            <input name="photo" type="file" class="custom-file-input" id="profilePhoto" @change="   onImageChange" :class="{ 'is-invalid': form.errors.has('photo') }">
                                            <label class="custom-file-label" for="profilePhoto">Choose file</label>
                                        </div>
                                        

                                        <img v-if="real_time_photo.length > 0" style="max-width:35px; margin-left:2%; border-radius:5%;" :src="real_time_photo" alt="user photo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input name="password" v-model="form.password" type="password" class="form-control" id="password" placeholder="Enter Password" :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password *</label>
                                        <input name="password_confirmation"  v-model="form.password_confirmation" type="password" class="form-control" id="confirm" placeholder="Confirm Password" :class="{ 'is-invalid': form.errors.has('password_confirmation') }">
                                        <has-error :form="form" field="password_confirmation"></has-error>
                                    </div>
                                </div>
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create User</button>
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
            form: new Form({
                name: '',
                email: '',
                user_type: '0',
                contact_no: '',
                photo: '',
                gender:'Male',
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods:{

        createUser(){
        this.form.post('/api/user' , {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            })
            .then(response => { 
                this.form.name= '';
                this.form.email= '';
                this.form.user_type= '0';
                this.form.contact_no= '';
                this.form.photo= '';
                this.form.password= '';
                this.form.password_confirmation= '';
                this.$toast.success({
                    title:'SUCCESS',
                    message:'User Created Successfully'
                })
        }).catch(error => {
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
                if (error.response.data.errors.user_type) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.user_type[0],
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
            })
      },

      //form img feld on chang
      onImageChange(event){

            //object to form data
            const file = event.target.files[0]
            // Do some client side validation...
            this.form.photo = file


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
    
    
}
</script>
<style lang="">
    
</style>
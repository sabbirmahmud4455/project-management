<template lang="">
    <div>
        <div class="tab-pane container mt-3" id="settings">
            <form v-if="form.id" @submit.prevent="updateProject_desc()" @keydown="form.onKeydown($event)">
                <div class="card-body row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Documentation Description</label>
                            <vue-editor v-model="form.documentation"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="profilePhoto">Documentation File</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input name="docu" type="file" class="custom-file-input" id="docu_file_id" @change="onImageChange" :class="{ 'is-invalid': form.errors.has('document_file') }">
                                <label class="custom-file-label" for="profilePhoto">Choose zip file</label>
                            </div>
                            <button v-if="have_file" @click="file_x" class="btn btn-light"> <i
                                                        class="fa fa-times"
                                                        aria-hidden="true"
                                                    ></i></button>

                            <i v-if="have_file" class="fas fa-file-archive btn"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Project Description</label>
                            <vue-editor v-model="form.description"/>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <button type="submit" class="btn btn-primary">Update Project Description</button>

            </form>
            <form v-else @submit.prevent="createProject_desc()" @keydown="form.onKeydown($event)">
                <div class="card-body row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Documentation Description</label>
                            <vue-editor v-model="form.documentation"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="profilePhoto">Docu</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input name="docu" type="file" class="custom-file-input" id="docu_file_id" @change="onImageChange" :class="{ 'is-invalid': form.errors.has('document_file') }">
                                <label class="custom-file-label" for="profilePhoto">Choose zip file</label>
                            </div>
                            <button  v-if="have_file" @click="file_x" class="btn btn-light"> <i
                                                        class="fa fa-times"
                                                        aria-hidden="true"
                                                    ></i></i></button>

                            <i v-if="form.have_file" class="fas fa-file-archive btn"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Project Description</label>
                            <vue-editor v-model="form.description"/>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <button type="submit" class="btn btn-primary">Update Project Description</button>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</template>
<script>
import { Form } from 'vform'
import { objectToFormData } from 'object-to-formdata'
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            id: this.$route.params.id,
            have_file:'',
            form: new Form({
                id:'',
                document_file: '',
                description:'<h4 class="text-muted">Project Description</h4>',
                documentation:'<h4 class="text-muted">Project Documentation</h4>',
            })
        }
    },
    methods:{
        file_x(){
            document.getElementById('docu_file_id').value = '';
            this.form.document_file='';
            this.have_file='';
        },
        editProject_desc(){
            axios.get(`/api/project_desc/edit/${this.id}`)
            .then(response => {
                if (response.data[0]) {
                    this.form.id= response.data[0].id;
                    this.have_file= response.data[0].document_path;
                    this.form.documentation= response.data[0].documentation;
                    this.form.description= response.data[0].description;
                }
            })
        },
        updateProject_desc(){

        this.form.post(`/api/project_desc/update/${this.id}` , {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            })
            .then(response => {
                this.$toast.success({
                    title:'SUCCESS',
                    message:'Updated Successfully'
                })
            }).catch(error => {
                    if (error.response.data.errors.document_file) {
                    this.$toast.error({
                    title:'! ERRORS',
                    message: error.response.data.errors.document_file[0],
                    })
                    }
                })
      },
      createProject_desc(){

       this.form.post(`/api/project_desc/create/${this.id}` , {
                transformRequest: [function (data, headers) {
                    return objectToFormData(data)
                }],
                onUploadProgress: e => {
                    // Do whatever you want with the progress event
                    console.log(e)
                }
            })
            .then(response => {
                this.$toast.success({
                    title:'SUCCESS',
                    message:'Updated Successfully'
                })
            }).catch(error => {
                    if (error.response.data.errors.document_file) {
                    this.$toast.error({
                    title:'! ERRORS',
                    message: error.response.data.errors.document_file[0],
                    })
                    }
                })
      },
      //form img feld on chang
      onImageChange(event){

            //object to form data
            const file = event.target.files[0]
            // Do some client side validation...
            this.form.document_file = file
            this.have_file = 'aksdfkajdfjasd'
        }

    },
    mounted(){
       this.editProject_desc();
    },
    components : {
        VueEditor
    },


}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<template lang="">
    <div>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Update Module</h1>
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
                            <h3 class="card-title">Module</h3>
                        </div>
                        <!-- /.card-header -->
                        <form   @submit.prevent="updateModule()" @keydown="form.onKeydown($event)">
                            <div class="card-body row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="module_name">Name *</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="module_name">Title</label>
                                        <input v-model="form.title" type="text" name="title" class="form-control" placeholder="Enter Title" :class="{ 'is-invalid': form.errors.has('title') }">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputStatus">Project</label>
                                        <select v-model="form.project_id" class="form-control custom-select" :class="{ 'is-invalid': form.errors.has('project_id') }">
                                            <option value="0">Select Project</option>
                                        <option v-if="all_projects.length" v-for="(project, index) in all_projects" :key="index" :value="project.id">{{project.name}}</option>
                                        </select>
                                        <has-error :form="form" field="project_id"></has-error>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Description</label>
                                        <vue-editor v-model="form.description"/>
                                    </div>
                                </div>
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Module</button>
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
import { VueEditor } from "vue2-editor";

export default {
    data() {
        return {
            all_projects:[],
            form: new Form({
                 name:'',
                 title:'',
                project_id:0,
                description:'<h4 class="text-muted">Module Details</h4>',
            })
        }
    },
    methods:{
        getProject(){
            axios.get('/api/all_projects').then(response => {
                this.all_projects = response.data;
            })
        },
        editModule(){
            let id = this.$route.params.id;
            axios.get(`/api/module/${id}/edit`)
            .then(response => {
                this.form.name= response.data.name;
                this.form.title= response.data.title;
                this.form.project_id= response.data.project_id;
                this.form.description=response.data.description;
        })
      },
        updateModule(){
        let id = this.$route.params.id;
        this.form.put(`/api/module/${id}`)
            .then(response => { 
                this.$toast.success({
                    title:'SUCCESS',
                    message:'Module Updated Successfully'
                })
        }).catch(error => {
                if (error.response.data.errors.name) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.name[0],
                  })
                }
                if (error.response.data.errors.project_id) {
                  this.$toast.error({
                  title:'! ERRORS',
                  message: error.response.data.errors.project_id[0],
                  })
                }
            })
      },

    },
    mounted(){
       this.editModule();
       this.getProject();
    },
    components: { 
        VueEditor
    },
    
    
}
</script>
<style lang="">
    
</style>
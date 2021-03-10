<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Modules</h1>
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
                                <h3 class="card-title">All Modules</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered projects">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">
                                                #
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                               Project
                                            </th>
                                            <th  style="width: 7%" class="text-center">
                                                Status
                                            </th>
                                            <th style="width: 20%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="all_modules.data.length" v-for="(module, index) in all_modules.data" :key="index">
                                            <td>
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <span v-if="module.name">{{module.name}}</span>
                                                <span v-else>Null</span>
                                                
                                            </td>
                                            <td>
                                                <span v-if="module.title">{{module.title}}</span>
                                                <span v-else>Null</span>
                                                
                                            </td>
                                            <td>
                                                <span v-if="module.project">
                                                    <router-link  :to="{name:'project_view', params:{id: module.project.id}}">
                                                      {{module.project.name}}
                                                    </router-link>
                                                    
                                                    
                                                    </span>
                                                <span v-else>Null</span>
                                            </td>
                                            <td>
                                                <span v-if="module.status" class="badge badge-success">{{module.status}}</span>
                                                <span v-else class=" badge badge-danger">null</span>
                                            </td>
                                            <td class="project-actions text-right">
                                                <router-link  :to="{name:'module_view', params:{id: module.id}}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </router-link>
                                                <router-link  :to="{name:'module_update', params:{id: module.id}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </router-link>
                                                <a class="btn btn-danger btn-sm" href="#delete_modal"  data-toggle="modal" @click="delete_data.data=module, delete_data.index=index">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <pagination :data="all_modules" :limit=2 align='center'  @pagination-change-page="getModule">
                                    <span slot="prev-nav">Previous <i class="fas fa-arrow-left "></i></span>
                                    <span slot="next-nav"><i class="fas fa-arrow-right "></i> Next</span>
                                </pagination>
                                </ul>
                            </div>
                        </div>

                        <!-- delete Modal HTML -->
                        <div id="delete_modal" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fas fa-trash-alt material-icons"></i>
                                        </div>						
                                        <h4 class="modal-title w-100">Are you sure?</h4>	
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger"  data-dismiss='modal' @click="moduleDelete(delete_data.data , delete_data.index)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
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
export default {
    data() {
        return {
            all_modules:{},
            delete_data:{
                data:[],
                index:[]
            }
        }
    },
    methods:{
        getModule(page){
                    if (typeof page === 'undefined') {
                    page = 1;
                }
            axios.get('/api/module?page=' + page).then(response => {
                this.all_modules = response.data;
                console.log(all_modules['0']);
            })
        },
        moduleDelete(data, index){
            axios.delete(`/api/module/${data.id}`).then( res=>{

                this.all_modules.data.splice(index, 1);

                  this.$toast.success({
                  title:'SUCCESS',
                  message: res.data,
                  })
                })
        }
    },
    mounted() {
        this.getModule();
    },
}
</script>
<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sprint Tasks</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link :to="{ name: 'home' }">
                                    Home
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                Sprint Tasks
                            </li>
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
                                <h3 class="card-title title d-flex align-items-center">All Sprint Tasks</h3>
                                <router-link  :to="{name:'create_sprint_task'}" class=" btn btn-info ml-auto">
                                    Create Sprint Task
                                </router-link>
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
                                                Type
                                            </th>
                                            <th>
                                               Start Date
                                            </th>
                                            <th>
                                               End Date
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
                                        <tr v-if="all_sprint_tasks.data.length" v-for="(sprint_task, index) in all_sprint_tasks.data" :key="index">
                                            <td>
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <span v-if="sprint_task.name">{{sprint_task.name}}</span>
                                                <span v-else>Null</span>

                                            </td>
                                            <td>
                                                <span>{{sprint_task.type}}</span>

                                            </td>

                                            <td>
                                                <span>{{sprint_task.start_date}}</span>

                                            </td>
                                            <td>
                                                <span>{{sprint_task.end_date}}</span>
                                            </td>

                                            <td>
                                                <span v-if="sprint_task.status" class="badge badge-success">{{sprint_task.status}}</span>
                                                <span v-else class=" badge badge-danger">null</span>
                                            </td>
                                            <td class="project-actions text-right">
                                                <router-link  :to="{name:'sprint_task_view', params:{id: sprint_task.id}}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </router-link>
                                                <router-link  :to="{name:'sprint_task_update', params:{id: sprint_task.id}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </router-link>
                                                <a class="btn btn-danger btn-sm" href="#delete_modal"  data-toggle="modal" @click="delete_data.id=sprint_task.id, delete_data.index=index">
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
                                <pagination :data="all_sprint_tasks" :limit=2 align='center'  @pagination-change-page="getsprint_task">
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
                                        <button type="button" class="btn btn-danger"  @click="sprint_taskDelete(delete_data.id , delete_data.index)">Delete</button>
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
            all_sprint_tasks:{},
            delete_data:{
                id:null,
                index:null
            }
        }
    },
    methods:{
        getsprint_task(page){
                    if (typeof page === 'undefined') {
                    page = 1;
                }
            axios.get('/api/sprint_task?page=' + page).then(response => {
                this.all_sprint_tasks = response.data;
            })
        },
        sprint_taskDelete(id, index){
            axios.delete(`/api/sprint_task/${id}`).then( res=>{
                $('#delete_modal').modal('hide');
                this.all_sprint_tasks.data.splice(index, 1);

                  this.$toast.success({
                  title:'SUCCESS',
                  message: "Sprint Task Deleted Successfully",
                  })
                })
        }
    },
    mounted() {
        this.getsprint_task();
    },
}
</script>

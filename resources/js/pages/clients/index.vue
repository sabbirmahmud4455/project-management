<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Clients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link
                                        :to="{ name: 'home' }"
                                        >
                                        Home
                                    </router-link>
                            </li>

                            <li class="breadcrumb-item active">Clients</li>
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
                                <h3 class="card-title d-flex align-items-center">All Clients</h3>

                                <router-link  :to="{name:'clients_create'}" class=" btn btn-info ml-auto">
                                    Create Client
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
                                                Email
                                            </th>
                                            <th>
                                                Contact No
                                            </th>
                                            <th  style="width: 7%" class="text-center">
                                                Status
                                            </th>
                                            <th  style="width: 7%" class="text-center">
                                                Photo
                                            </th>
                                            <th style="width: 20%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="all_clients.data.length" v-for="(client, index) in all_clients.data" :key="index">
                                            <td>
                                                {{index+1}}
                                            </td>
                                            <td>
                                                <span v-if="client.name">{{client.name}}</span>
                                                <span v-else>Null</span>

                                            </td>
                                            <td>
                                                <span v-if="client.email">{{client.email}}</span>
                                                <span v-else>Null</span>

                                            </td>
                                            <td>
                                                <span v-if="client.contact_no">{{client.contact_no}}</span>
                                                <span v-else>Null</span>
                                            </td>

                                            <td>
                                                <span v-if="client.status===1" class="badge badge-success">Active</span>
                                                <span v-else class=" badge badge-danger">InActive</span>
                                            </td>
                                            <td>
                                                <div  v-if="client.photo" class=" d-flex justify-content-center">
                                                    <img class="table-avatar" :src="client.photo" alt="client photo">
                                                </div>
                                                <span v-else class=" badge badge-danger">Null</span>
                                            </td>
                                            <td class="project-actions text-right">
                                                <router-link  :to="{name:'client_profile', params:{id: client.id}}" class="btn btn-link px-1">
                                                    <i
                                                    class=" text-primary fa fa-eye"
                                                    aria-hidden="true"
                                                ></i>
                                                </router-link>
                                                <router-link  :to="{name:'client_update', params:{id: client.id}}" class="btn btn-link px-1">
                                                <i
                                                    class=" text-secondary fa fa-pencil"
                                                    aria-hidden="true"
                                                ></i>
                                                </router-link>
                                                <a class="btn btn-link px-1" href="#delete_modal"  data-toggle="modal" @click="delete_data.data=client, delete_data.index=index">
                                                    <i
                                                    class=" text-danger fa fa-trash"
                                                    aria-hidden="true"
                                                ></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <pagination :data="all_clients" :limit=2 align='center'  @pagination-change-page="getClient">
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
                                        <button type="button" class="btn btn-danger"  data-dismiss='modal' @click="clientDelete(delete_data.data , delete_data.index)">Delete</button>
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
            all_clients:{},
            delete_data:{
                data:[],
                index:[]
            }
        }
    },
    methods:{
        getClient(page){
                    if (typeof page === 'undefined') {
                    page = 1;
                }
            axios.get('/api/client?page=' + page).then(response => {
                this.all_clients = response.data;
            })
        },
        clientDelete(data, index){
            axios.delete(`/api/client/${data.id}`).then( res=>{

                this.all_clients.data.splice(index, 1);

                  this.$toast.success({
                  title:'SUCCESS',
                  message: res.data,
                  })
                })
        }
    },
    mounted() {
        this.getClient();
    },
}
</script>

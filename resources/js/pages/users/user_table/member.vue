<template lang="">
    <div>
        <div class="card card-primary">
            <div class="card-header d-flex">
                <h3 class="card-title title d-flex align-items-center">All Members</h3>
                <div class="ml-auto d-flex">
                    <router-link
                        :to="{ name: 'user_create' }"
                        class="nav-link bg-info mx-1"
                    >
                        Create User
                    </router-link>
                    <router-link  :to="{name:'users'}" class="nav-link bg-info mx-1" active-class="active bg-white">All Users</router-link>
                    <router-link  :to="{name:'users_admin'}" class="nav-link bg-info mx-1" active-class="active bg-white">Admins</router-link>
                    <router-link  :to="{name:'users_member'}" class="nav-link bg-info mx-1" active-class="active bg-white">Members</router-link>
                </div>
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
                            <th  style="width: 8%">
                                Type
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
                        <tr v-if="member_users.data.length" v-for="(user, index) in member_users.data" :key="index">
                            <td>
                                {{index+1}}
                            </td>
                            <td>
                                <span v-if="user.name">{{user.name}}</span>
                                <span v-else>Null</span>

                            </td>
                            <td>
                                <span v-if="user.email">{{user.email}}</span>
                                <span v-else>Null</span>

                            </td>
                            <td>
                                <span v-if="user.type">{{user.type}}</span>
                                <span v-else>Null</span>

                            </td>
                            <td>
                                <span v-if="user.contact_no">{{user.contact_no}}</span>
                                <span v-else>Null</span>
                            </td>

                            <td>
                                <span v-if="user.status===1" class="badge badge-success">Active</span>
                                <span v-else class=" badge badge-danger">InActive</span>
                            </td>
                            <td>
                                <div  v-if="user.photo" class=" d-flex justify-content-center">
                                    <img class="table-avatar" :src="user.photo" alt="user photo">
                                </div>
                                <span v-else class=" badge badge-danger">Null</span>
                            </td>
                            <td class="project-actions text-right">
                                <router-link  :to="{name:'user_profile', params:{id: user.id}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </router-link>
                                <router-link  :to="{name:'user_update', params:{id: user.id}}" class="btn btn-info btn-sm">
                                  <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </router-link>
                                <a class="btn btn-danger btn-sm" href="#delete_modal"  data-toggle="modal" @click="delete_data.data=user, delete_data.index=index">
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
                <pagination :data="member_users" :limit=2 align='center'  @pagination-change-page="getUser">
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
                        <button type="button" class="btn btn-danger"  data-dismiss='modal' @click="userDelete(delete_data.data , delete_data.index)">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data() {
        return {
            member_users:{},
            delete_data:{
                data:[],
                index:[]
            }
        }
    },
    methods:{
        getUser(page){
                    if (typeof page === 'undefined') {
                    page = 1;
                }
            axios.get('/api/users/member?page=' + page).then(response => {
                this.member_users = response.data;
            })
        },
        userDelete(data, index){
            axios.delete(`/api/user/${data.id}`).then( res=>{

                this.member_users.data.splice(index, 1);

                  this.$toast.success({
                  title:'SUCCESS',
                  message: res.data,
                  })
                })
        }
    },
    mounted() {
        this.getUser();
    },
}
</script>
<style lang="">

</style>

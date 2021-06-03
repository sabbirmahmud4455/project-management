<template lang="">
    <div>
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i>Users</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="fa fa-home fa-lg"></i>
                    </router-link>
                </li>
                <li class="breadcrumb-item active">
                    Users
                </li>

                <!-- <li class="breadcrumb-item">
                    <i class="fa fa-home fa-lg"></i>
                </li>
                <li class="breadcrumb-item"><a href="#">Blank Page</a></li> -->
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">  <!-- vue route view -->
                <userList></userList></div>
                </div>



            </div>
        </div>
        

    </div>
</template>
<script>

import userList from "./user_table/user_list";

export default {
  data() {
    return {
      showFloatingButton: true,
    };
  },
  components: {
    userList,
  },
  mounted(){
      console.log("user list");
  }
};
</script>
<style lang=""></style>

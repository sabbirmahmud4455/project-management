<template lang="">
    <div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img
                style="max-width:70px"
                    class="app-sidebar__user-avatar"
                    :src="user&&user.photo"
                    alt="User Image"
                />
                <div>
                    <p class="app-sidebar__user-name">{{user&&user.name}}</p>
                    <p class="app-sidebar__user-designation">
                        Frontend Developer
                    </p>
                </div>
            </div>
            <ul class="app-menu">
                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'home' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Dashboard</span>
                    </router-link>
                </li>

                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'my_task' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">My Tasks</span>
                    </router-link>
                </li>




            </ul>
        </aside>
    </div>
</template>
<script>
export default {
    data() {
    return {
      user:null
    };
  },
  methods: {
      getUser(){
          axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get("/api/get-profile").then((response) => {
                    this.user=response.data;
                });
          });
      }
  },
    mounted(){
         this.getUser();
    }
};
</script>
<style lang=""></style>

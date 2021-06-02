<template lang="">
    <div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <img
                    class="app-sidebar__user-avatar"
                    src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                    alt="User Image"
                />
                <div>
                    <p class="app-sidebar__user-name">John Doe</p>
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
                        :to="{ name: 'users' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Users</span>
                    </router-link>
                </li>

                <!-- project -->

                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'projects' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Projects</span>
                    </router-link>
                </li>

                <!-- modules -->
                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'modules' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Modules</span>
                    </router-link>
                </li>

                <!-- tasks -->
                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'tasks' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Tasks</span>
                    </router-link>
                </li>

                <!-- sprint -->
                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'sprints' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Sprints</span>
                    </router-link>
                </li>

                <!-- app info -->
                <li class="nav-item has-treeview ">
                    <router-link
                        :to="{ name: 'app_info' }"
                        class="app-menu__item"
                        active-class="active"
                    >
                        <i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">App Info</span>
                    </router-link>
                </li>


            </ul>
        </aside>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

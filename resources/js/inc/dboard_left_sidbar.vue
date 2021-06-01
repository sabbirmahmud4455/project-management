<template lang="">
    <div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img
                    src="/template/dist/img/AdminLTELogo.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8"
                />
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'home' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="nav-icon fas fa-home "></i>
                                <p>Home</p>
                            </router-link>
                        </li>

                        <!-- user -->
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'users' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-users nav-icon"></i>
                                <p>
                                    Users
                                </p>
                            </router-link>
                        </li>

                        <!-- clients -->
                        <!-- <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'clients' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-users nav-icon"></i>
                                <p>
                                    Clients
                                </p>
                            </router-link>
                        </li> -->

                        <!-- project -->

                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'projects' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-project-diagram nav-icon"></i>
                                <p>
                                    Projects
                                </p>
                            </router-link>
                        </li>

                        <!-- modules -->
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'modules' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-project-diagram nav-icon"></i>
                                <p>
                                    Modules
                                </p>
                            </router-link>
                        </li>

                        <!-- tasks -->
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'tasks' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-tasks  nav-icon"></i>
                                <p>
                                    Tasks
                                </p>
                            </router-link>
                        </li>

                        <!-- sprint -->
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'sprints' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-tasks  nav-icon"></i>
                                <p>
                                    Sprints
                                </p>
                            </router-link>
                        </li>


                        <!-- app info -->
                        <li class="nav-item has-treeview ">
                            <router-link
                                :to="{ name: 'app_info' }"
                                class="nav-link"
                                active-class="active"
                            >
                                <i class="fas fa-info-circle"></i>
                                <p>
                                    App Info
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

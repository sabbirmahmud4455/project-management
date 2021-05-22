<template lang="">
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <nav
                class="main-header navbar navbar-expand navbar-white navbar-light"
            >
                <!-- Left navbar links -->
                <ul class="navbar-nav w-100">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-widget="pushmenu"
                            href="#"
                            role="button"
                            ><i class="fas fa-bars"></i
                        ></a>
                    </li>

                    <li
                        class="nav-item dropdown ml-auto d-flex align-items-center"
                    >
                        <a
                            id="navbarDropdown"
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="avatar-box">
                                <img
                                    style="max-width:35px"
                                    src="/template/dist/img/user2-160x160.jpg"
                                    class="img-circle elevation-2 mr-1"
                                    alt="User Image"
                                /> </span
                            >System Admin <span class="caret"></span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right"
                            aria-labelledby="navbarDropdown"
                        >
                            <a class="dropdown-item" href="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                            <a class="dropdown-item btn btn-danger" href="">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
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

                <!-- Sidebar -->
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
                            <li class="nav-item has-treeview ">
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
                            </li>

                            <!-- project -->

                            <li class="nav-item has-treeview ">
                                <router-link
                                    :to="{ name: 'projects' }"
                                    class="nav-link"
                                    active-class="active"
                                >
                                    <i
                                        class="fas fa-project-diagram nav-icon"
                                    ></i>
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
                                    <i
                                        class="fas fa-project-diagram nav-icon"
                                    ></i>
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
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- vue route view -->
            <router-view></router-view>

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong
                    >Copyright &copy; 2014-2019
                    <a href="https://adminlte.io">AdminLTE.io</a>.</strong
                >
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

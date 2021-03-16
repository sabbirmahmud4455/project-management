<template lang="">
    <div>
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                </ul>

                <!-- SEARCH FORM -->
                <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </form> -->

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                <img src="/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->


                    <!-- <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inactive Page</p>
                            </a>
                        </li>
                        </ul>
                    </li> -->



                    <li class="nav-item has-treeview ">
                        <router-link  :to="{name:'home'}" class="nav-link" active-class="active">
                            <i class="nav-icon fas fa-home "></i>
                            <p>Home</p>
                        </router-link>
                    </li>
                   
                   <!-- user -->
                    <li class="nav-item has-treeview ">
                        <a class="nav-link" active-class="active">
                            <i class="fas fa-user    "></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="pl-2 nav nav-treeview">
                            <li class="nav-item">
                                <router-link  :to="{name:'users'}" class="nav-link" active-class="active">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>
                                        Users
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link  :to="{name:'user_create'}" class="nav-link" active-class="active">
                                    <i class="fas fa-user-plus nav-icon  "></i>
                                    <p>
                                        Create User
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- clients -->
                    <li class="nav-item has-treeview ">
                        <a class="nav-link" active-class="active">
                            <i class="fas fa-user    "></i>
                        <p>
                            Client
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="pl-2 nav nav-treeview">
                            <li class="nav-item">
                                <router-link  :to="{name:'clients'}" class="nav-link" active-class="active">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>
                                        Clients
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link  :to="{name:'clients_create'}" class="nav-link" active-class="active">
                                    <i class="fas fa-user-plus nav-icon  "></i>
                                    <p>
                                        Create Client
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- project -->
                    <li class="nav-item has-treeview ">
                        <a class="nav-link" active-class="active">
                            <i class="fas fa-project-diagram nav-icon"></i>
                        <p>
                            Project
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        
                        <ul class="pl-2 nav nav-treeview">
                            <li class="nav-item">
                                <router-link  :to="{name:'projects'}" class="nav-link" active-class="active">
                                    <i class="fas fa-project-diagram nav-icon"></i>
                                    <p>
                                        Projects
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link  :to="{name:'project_create'}" class="nav-link" active-class="active">
                                    <i class="fas fa-project-diagram nav-icon"></i>
                                    <small></i> <i class="fas fa-plus"></i></small>
                                    <p>
                                        Create Project
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- modules -->
                    <li class="nav-item has-treeview ">
                        <a class="nav-link" active-class="active">
                            <i class="fas fa-project-diagram nav-icon"></i>
                        <p>
                            Module
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="pl-2 nav nav-treeview">
                            <li class="nav-item">
                                <router-link  :to="{name:'modules'}" class="nav-link" active-class="active">
                                    <i class="fas fa-project-diagram nav-icon"></i>
                                    <p>
                                        Modules
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link  :to="{name:'module_create'}" class="nav-link" active-class="active">
                                    <i class="fas fa-project-diagram nav-icon"></i>
                                    <small></i> <i class="fas fa-plus"></i></small>
                                    <p>
                                        Create Module
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- tasks -->
                    <li class="nav-item has-treeview ">
                        <a class="nav-link" active-class="active">
                            <i class="fas fa-tasks  nav-icon"></i>
                        <p>
                            Task
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="pl-2 nav nav-treeview">
                            <li class="nav-item">
                                <router-link  :to="{name:'tasks'}" class="nav-link" active-class="active">
                                    <i class="fas fa-tasks  nav-icon"></i>
                                    <p>
                                        Tasks
                                        
                                    </p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link  :to="{name:'task_create'}" class="nav-link" active-class="active">
                                    <i class="fas fa-tasks  nav-icon"></i>
                                    <small></i> <i class="fas fa-plus"></i></small>
                                    <p>
                                        Create Task
                                    </p>
                                </router-link>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item">
                        <a href="#" class="nav-link  bg-danger">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Log Out
                        </p>
                        </a>
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
                <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
            </div>
            <!-- ./wrapper -->
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>
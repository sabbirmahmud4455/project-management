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
                                <i class="fa fa-dashboard"></i> Profile
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

            <!-- Sidebar -->
            <leftSideBar></leftSideBar>

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
import leftSideBar from "../inc/dboard_left_sidbar";
export default {
    components: {
        leftSideBar
    }
};
</script>
<style lang=""></style>

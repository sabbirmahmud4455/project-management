<template lang="">
    <div>
        <div class="card card-primary">
            <div class="card-header d-flex">
                <h3 class="card-title">All Users</h3>
                <div class="ml-auto d-flex">
                    <router-link
                        :to="{ name: 'users' }"
                        class="nav-link"
                        active-class="active"
                        >All User</router-link
                    >
                    <router-link
                        :to="{ name: 'users_admin' }"
                        class="nav-link"
                        active-class="active"
                        >Admin</router-link
                    >
                    <router-link
                        :to="{ name: 'users_member' }"
                        class="nav-link"
                        active-class="active"
                        >Member</router-link
                    >
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Project Name
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th>
                                Project Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <a>
                                    AdminLTE v3
                                </a>
                                <br />
                                <small>
                                    Created 01.01.2019
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar3.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar04.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar5.png"
                                        />
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-green"
                                        role="progressbar"
                                        aria-volumenow="77"
                                        aria-volumemin="0"
                                        aria-volumemax="100"
                                        style="width: 77%"
                                    ></div>
                                </div>
                                <small>
                                    77% Complete
                                </small>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-link px-1" href="#">
                                    <i class="fas fa-folder"> </i>
                                    View
                                </a>
                                <a class="btn btn-link px-1" href="#">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-link px-1" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <a>
                                    AdminLTE v3
                                </a>
                                <br />
                                <small>
                                    Created 01.01.2019
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar3.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar04.png"
                                        />
                                    </li>
                                    <li class="list-inline-item">
                                        <img
                                            alt="Avatar"
                                            class="table-avatar"
                                            src="/template/dist/img/avatar5.png"
                                        />
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div
                                        class="progress-bar bg-green"
                                        role="progressbar"
                                        aria-volumenow="77"
                                        aria-volumemin="0"
                                        aria-volumemax="100"
                                        style="width: 77%"
                                    ></div>
                                </div>
                                <small>
                                    77% Complete
                                </small>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder"> </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div> -->
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>

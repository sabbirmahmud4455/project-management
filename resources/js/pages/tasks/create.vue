<template lang="">
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
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
                            <h3 class="card-title">Member</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="user_name">User Name</label>
                                        <input required type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="user_email">User Email</label>
                                        <input required type="email" name="user_name" id="user_email" class="form-control" placeholder="User Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="user_cell">User Cell</label>
                                  <input type="text" name="user_cell" id="user_cell" class="form-control" placeholder="User Cell">
                                </div>

                                <input class="btn btn-primary" type="submit" value="Create">
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col-md-6 -->
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
    
}
</script>
<style lang="">
    
</style>
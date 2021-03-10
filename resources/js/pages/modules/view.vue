<template lang="">
    <div>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Module</h1>
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
                    

<div class="card card-primary card-outline">
              <div class="card-header">
                <h5>Module Description</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h3 v-if="title.length">{{title}}</h3>

                <div v-html="description"></div>



                
              </div>
              <!-- /.card-body
              <div class="card-footer card-comments">
                
                
              </div>
              <!-- /.card-footer -->
              <!-- <div class="card-footer">
                <form action="#" method="post">
                  <img class="img-fluid img-circle img-sm" src="/template/dist/img/user4-128x128.jpg" alt="Alt Text"> -->
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <!-- <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form> 
              </div> -->
              <!-- /.card-footer -->
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
    data() {
        return {
            name:'',
            title:'',
            project:'',
            description:'',
        }
    },
    methods:{
        getUser(){
            let id = this.$route.params.id;
            axios.get(`/api/module/${id}`)
            .then(response => {
                this.name= response.data.name;
                this.title= response.data.title;
                this.project= response.data.project;
                this.description=response.data.description;
        })
      },
    },
    mounted(){
        this.getUser();
    }
}
</script>
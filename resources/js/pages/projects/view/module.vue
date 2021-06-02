<template lang="">
    <div>
        <div class="row">
            <div v-if="modules.data" v-for="(module, index) in modules.data" :key="index" class="col-6">
                <div class="card card-widget">
                <div class="card-body">
                    <h6>
                        <span>
                            <router-link :to="{name:'module_view', params:{id: module.id}}" class=" text-dark">
                            {{module.name}}
                            </router-link>
                        </span>
                    </h6>
                    <h5>
                        <span>
                            <router-link :to="{name:'module_view', params:{id: module.id}}" class=" text-dark">
                            {{module.title}}
                            </router-link>
                        </span>
                    </h5>
                    <span class=" badge badge-primary ">{{module.status}}</span>
                </div>
                <!-- /.card-body -->
                
                </div>
                <pagination :data="modules" :limit=2 align='center'  @pagination-change-page="getmodule">
                    <span slot="prev-nav">Previous <i class="fas fa-arrow-left "></i></span>
                    <span slot="next-nav"><i class="fas fa-arrow-right "></i> Next</span>
                </pagination>
            </div>
            <div class="col-12" v-if="!modules.data">
                <h5 class="text-center text-muted">Module Not Found</h5>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            modules:{},
        }
    },
    methods:{
        getmodule(page){
            if (typeof page === 'undefined') {
            page = 1;
            }
            axios.get(`/api/project/module/${this.id}?page=` + page).then(response => {
                this.modules = response.data;
            })
        },
        
    },
    mounted() {
        this.getmodule();
    },
}
</script>
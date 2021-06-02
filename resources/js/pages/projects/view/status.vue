<template lang="">
    <div>
        <div class="tab-pane" id="activity">
            <ul class="list-group list-group-unbordered mb-3">
                <li v-if="description" class="list-group-item">
                    <b>Documentation File</b> <span class="mr-4"><button @click="file_download()" class="btn btn-success "><i class="fas fa-file-download"></i> Download</button></span>
                </li>
                
                <br>
                <li v-if="description" class="list-group-item">
                    <b class='d-block'>Project Description </b>
                    <div v-html="description"></div>
                </li>
                <li v-if="documentation" class="list-group-item">
                    <b class='d-block'>Documentation Description </b>
                    <div v-html="documentation"></div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            file_path:'',
            description:'',
            documentation:'',
        }
    },
    methods:{
        
        getProject_desc(){
           axios.get(`/api/project_desc/edit/${this.id}`)
            .then(response => {
                if (response.data[0]) {
                    this.file_path= response.data[0].document_path;
                    this.documentation= response.data[0].documentation;
                    this.description= response.data[0].description;
                }
            })
        },
        file_download(){
            window.location.replace(`/api/download/${this.id}`);
        }
    },
    mounted(){
        this.getProject_desc()
    }
}
</script>
<style lang="">
    
</style>
<template lang="">
    <div>
        <div class="tab-pane container mt-3" id="settings">
            <form   @submit.prevent="createProject()" @keydown="form.onKeydown($event)">
                            <div class="card-body row">
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="project_name">Name *</label>
                                        <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                        <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="inputStatus">Client</label>
                                        <select @click="getClient()" v-model="form.client_id" class="form-control custom-select" :class="{ 'is-invalid': form.errors.has('client_id') }">
                                            <option value="0">Select Client</option>
                                        <option v-if="all_clients.length" v-for="(client, index) in all_clients" :key="index" :value="client.id">{{client.name}}</option>
                                        </select>
                                        <has-error :form="form" field="client_id"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="form-control">
                                            <VueDatePicker v-model="form.start_date" placeholder="Choose date" clearable/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label >End Date</label>
                                        <div class="form-control">
                                            <VueDatePicker v-model="form.end_date" placeholder="Choose date" clearable />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="project_type">Type</label>
                                        <input v-model="form.type" type="text" name="type" class="form-control" id="project_type" placeholder="Enter type" :class="{ 'is-invalid': form.errors.has('type') }">
                                        <has-error :form="form" field="type"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 col">
                                    <div class="form-group">
                                        <label for="development_cost">Development Cost</label>
                                        <input v-model="form.development_cost" type="number" name="development_cost" class="form-control" id="development_cost" placeholder="Development Cost" :class="{ 'is-invalid': form.errors.has('development_cost') }">
                                        <has-error :form="form" field="development_cost"></has-error>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="profilePhoto">Photo</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input name="photo" type="file" class="custom-file-input" id="profilePhoto" @change="onImageChange" :class="{ 'is-invalid': form.errors.has('photo') }">
                                            <label class="custom-file-label" for="profilePhoto">Choose file</label>
                                        </div>
                                        <button  v-if="real_time_photo.length > 0" @click="img_x" class="btn btn-light"><i class="fas fa-times"></i></button>
                                        <img v-if="real_time_photo.length > 0" style="max-width:35px; margin-left:2%; border-radius:5%;" :src="real_time_photo" alt="project photo">
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Project</button>
                            </div>
                        </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                product_id: this.$route.params.id,
                document_path:'',
                documentation:'',
                description:'',
                remarks:'',
            })
        }
    },
}
</script>
<style lang="">
    
</style>
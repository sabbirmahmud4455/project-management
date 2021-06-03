<template>
    <div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">App Info</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        Home
                                    </router-link>
                                </li>

                                <li class="breadcrumb-item active">
                                    App Info
                                </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="name"
                                                            class="col-sm-12 control-label"
                                                            >App Name</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <input
                                                                v-model="
                                                                    form.app_name
                                                                "
                                                                id="name"
                                                                type="text"
                                                                class="form-control"
                                                                name="name"
                                                                placeholder="No Shop Name Added"
                                                                required="true"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="address"
                                                            class="col-sm-12 control-label"
                                                            >Address</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <textarea
                                                                v-model="
                                                                    form.address
                                                                "
                                                                name="address"
                                                                id="address"
                                                                cols="1"
                                                                rows="1"
                                                                class="form-control"
                                                                placeholder="No Address Added"
                                                            ></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="copy_right"
                                                            class="col-sm-12 control-label"
                                                            >Copy right
                                                            text</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <textarea
                                                                v-model="
                                                                    form.copy_right_text
                                                                "
                                                                name="copy_right"
                                                                id="details"
                                                                cols="1"
                                                                rows="1"
                                                                class="form-control"
                                                                placeholder="No Copy Right Text  Added"
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="details"
                                                            class="col-sm-12 control-label"
                                                            >Details</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <textarea
                                                                v-model="
                                                                    form.details
                                                                "
                                                                name="details"
                                                                id="details"
                                                                cols="1"
                                                                rows="2"
                                                                class="form-control"
                                                                placeholder="No Details Added"
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="subtitle"
                                                            class="col-sm-12 control-label"
                                                            >Subtitle</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <input
                                                                v-model="
                                                                    form.app_subtitle
                                                                "
                                                                id="subtitle"
                                                                type="text"
                                                                class="form-control"
                                                                name="subtitle"
                                                                placeholder="No Subtitle Added"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="email"
                                                            class="col-sm-12 control-label"
                                                            >Email</label
                                                        >
                                                        <div class="col-sm-12">
                                                            <input
                                                                id="email"
                                                                v-model="
                                                                    form.email
                                                                "
                                                                type="text"
                                                                class="form-control"
                                                                name="email"
                                                                placeholder="No Email Added"
                                                            />
                                                            <!-- <div class="text-danger"  v-if="$page.props.errors.email">{{$page.props.errors.email}}</div> -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="logo"
                                                            class="col-sm-12 control-label"
                                                            >Logo</label
                                                        >
                                                        <div class="col-sm-8">
                                                            <input
                                                                name="logo"
                                                                @change="
                                                                    onImageChange
                                                                "
                                                                type="file"
                                                                @input="
                                                                    form.logo =
                                                                        $event.target.files[0]
                                                                "
                                                            />
                                                            <!-- <div class="text-danger" v-if="$page.props.errors.logo">{{$page.props.errors.logo}}</div> -->

                                                            <div
                                                                class="mt-3 mb-3"
                                                            >
                                                                <img
                                                                    v-if="
                                                                        real_time_photo
                                                                    "
                                                                    id="logo_preview"
                                                                    :src="
                                                                        real_time_photo
                                                                    "
                                                                    alt="LOGO"
                                                                    class=" img-responsive img-thumbnail"
                                                                />
                                                                <div v-else>
                                                                    <img
                                                                        v-if="
                                                                            app_logo
                                                                        "
                                                                        id="logo_preview"
                                                                        :src="
                                                                            app_logo
                                                                        "
                                                                        alt="Logo"
                                                                        class=" img-responsive img-thumbnail"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label
                                                            for="favicon"
                                                            class="col-sm-12 control-label"
                                                            >favicon</label
                                                        >
                                                        <div class="col-sm-8">
                                                            <input
                                                                name="favicon"
                                                                @change="
                                                                    onImageChangefavicon
                                                                "
                                                                type="file"
                                                                @input="
                                                                    form.favicon =
                                                                        $event.target.files[0]
                                                                "
                                                            />
                                                            <!-- <div class="text-danger" v-if="$page.props.errors.favicon">{{$page.props.errors.favicon}}</div> -->

                                                            <div
                                                                class="mt-3 mb-3"
                                                            >
                                                                <img
                                                                    v-if="
                                                                        real_time_favicon
                                                                    "
                                                                    id="favicon_preview"
                                                                    :src="
                                                                        real_time_favicon
                                                                    "
                                                                    alt="favicon"
                                                                    class=" img-responsive img-thumbnail"
                                                                />
                                                                <div v-else>
                                                                    <img
                                                                        v-if="
                                                                            app_favicon
                                                                        "
                                                                        id="favicon_preview"
                                                                        :src="
                                                                            app_favicon
                                                                        "
                                                                        alt="favicon"
                                                                        class=" img-responsive img-thumbnail"
                                                                    />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button
                                        @click="submit()"
                                        class="btn  btn-primary"
                                    >
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</template>
<script>
import { objectToFormData } from "object-to-formdata";
export default {
    data() {
        return {
            real_time_photo: null,
            app_logo: null,
            real_time_favicon: null,
            app_favicon: null,
            // app_logo: app_info[0].logo,
            form: {
                app_name: null,
                app_subtitle: null,
                address: null,
                details: null,
                email: null,
                logo: null,
                favicon: null,
                copy_right_text: null
            }
        };
    },
    methods: {
        getAppInfo() {
            axios.get("/api/app_info").then(res => {
                this.form.app_name = res.data.name;
                this.form.app_subtitle = res.data.subtitle;
                this.form.address = res.data.address;
                this.form.details = res.data.details;
                this.form.email = res.data.email;
                this.app_logo = res.data.logo;
                this.form.copy_right_text = res.data.copy_right_text;
                this.app_favicon = res.data.favicon;
                0;
                // (this.form.app_name = res.data.name),
                //     (this.form.app_subtitle = res.data.subtitle),
                //     (this.form.address = res.data.address),
                //     (this.form.details = res.data.details),
                //     (this.form.email = res.data.email),
                //     (this.form.logo = res.data.logo),
                //     (this.form.favicon = res.data.favicon);
            });
        },
        submit() {
            axios
                .post("/api/app_info", this.form, {
                    transformRequest: [
                        function(data, headers) {
                            return objectToFormData(data);
                        }
                    ],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        console.log(e);
                    }
                })
                .then(res => {
                    this.$toast.success({
                        title: "SUCCESS",
                        message: "App Info Updated Successfully"
                    });
                })
                .catch(error => {
                    if (error.response.data.errors.email) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.email[0]
                        });
                    }
                    if (error.response.data.errors.logo) {
                        this.$toast.error({
                            title: "! ERRORS",
                            message: error.response.data.errors.logo[0]
                        });
                    }
                });
        },
        onImageChange(event) {
            //object to form data
            const file = event.target.files[0];
            // Do some project side validation...
            this.form.logo = file;
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = e => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.real_time_photo = e.target.result;
                };
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        },
        onImageChangefavicon(event) {
            //object to form data
            const file = event.target.files[0];
            // Do some project side validation...
            this.form.favicon = file;
            var input = event.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = e => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.real_time_favicon = e.target.result;
                };
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }
        }
    },
    mounted() {
        this.getAppInfo();
    }
};
</script>
<style scoped>
.content-wrapper{
    margin-left: 0px !important;
}
</style>
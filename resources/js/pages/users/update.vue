<template lang="">
    <div>



        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
                <p>Start a beautiful journey here</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">

                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'home' }">
                                        <i class="fa fa-home fa-lg"></i>
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item">
                                    <router-link :to="{ name: 'users' }">
                                        Users
                                    </router-link>
                                </li>

                                <li class="breadcrumb-item active">
                                    User Update
                                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Update User</h3>
                    <div class="tile-body">












<form
                                    @submit.prevent="updateUser()"
                                    @keydown="form.onKeydown($event)"
                                >
                                    <div class="card-body row">
                                        <div class="col-md-6 col">

                                            <div class="form-group">
                                                <label for="user_name"
                                                    >Name *</label
                                                >
                                                <input
                                                    v-model="form.name"
                                                    type="text"
                                                    name="name"
                                                    class="form-control"
                                                    placeholder="Enter Name"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'name'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="name"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">

                                            <div class="form-group">
                                                <label for="type">User Type</label>
                                                <multiselect  type="text" v-model="form.types" tag-placeholder="Add this as new skill" placeholder="Search or add a skill" label="name" track-by="name" :options="typeOptions" :multiple="true" :taggable="true"></multiselect>
                                            </div>


                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="user_cell"
                                                    >Contact Number</label
                                                >
                                                <input
                                                    v-model="form.contact_no"
                                                    type="text"
                                                    class="form-control"
                                                    id="user_cell"
                                                    placeholder="Enter Contact"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'contact_no'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="contact_no"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                           <div class="form-group">
                                                <label for="type">User Role</label>
                                                <multiselect type="text" v-model="form.roles" tag-placeholder="Add this as new skill" placeholder="Search or add a skill" label="name" track-by="name" :options="roleOptions" :multiple="true" :taggable="true"></multiselect>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="user_email"
                                                    >Email address *</label
                                                >
                                                <input
                                                    v-model="form.email"
                                                    type="email"
                                                    class="form-control"
                                                    id="user_email"
                                                    placeholder="Enter email"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'email'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="email"
                                                ></has-error>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="inputStatus"
                                                    >Gender</label
                                                >
                                                <div class="form-check">
                                                    <label
                                                        class="form-check-label"
                                                        style="min-width:80px"
                                                    >
                                                        <input
                                                            type="radio"
                                                            class="form-check-input"
                                                            value="Male"
                                                            v-model="
                                                                form.gender
                                                            "
                                                        />
                                                        Male
                                                    </label>
                                                    <label
                                                        class="form-check-label"
                                                    >
                                                        <input
                                                            type="radio"
                                                            class="form-check-input"
                                                            value="Female"
                                                            v-model="
                                                                form.gender
                                                            "
                                                        />
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <label for="profilePhoto"
                                                    >Photo</label
                                                >
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input
                                                            name="photo"
                                                            type="file"
                                                            class="custom-file-input"
                                                            id="profilePhoto"
                                                            @change="
                                                                onImageChange
                                                            "
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'photo'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="photo"
                                                        ></has-error>
                                                        <label
                                                            class="custom-file-label"
                                                            for="profilePhoto"
                                                            >Choose file</label
                                                        >
                                                    </div>

                                                    <img
                                                        v-if="
                                                            real_time_photo.length >
                                                                0
                                                        "
                                                        style="max-width:35px; margin-left:2%; border-radius:5%;"
                                                        :src="real_time_photo"
                                                        alt="user photo"
                                                    />
                                                    <img
                                                        v-else
                                                        style="max-width:35px; margin-left:2%; border-radius:5%;"
                                                        :src="real_photo"
                                                        alt="user photo"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for=""
                                                >password update</label
                                            >
                                            <toggle-switch
                                                :options="myOptions"
                                                v-model="form.pass_change"
                                            />
                                        </div>
                                        <div
                                            v-if="form.pass_change == 'On'"
                                            class="col-md-4 col"
                                        >
                                            <div class="form-group">
                                                <label for="old_password"
                                                    >Old Password *</label
                                                >
                                                <input
                                                    name="old_password"
                                                    v-model="form.old_password"
                                                    type="password"
                                                    class="form-control"
                                                    id="old_password"
                                                    placeholder="Enter Old Password"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'old_password'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="old_password"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div
                                            v-if="form.pass_change == 'On'"
                                            class="col-md-4 col"
                                        >
                                            <div class="form-group">
                                                <label for="password"
                                                    >New Password *</label
                                                >
                                                <input
                                                    name="password"
                                                    v-model="form.password"
                                                    type="password"
                                                    class="form-control"
                                                    id="password"
                                                    placeholder="Enter New Password"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'password'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="password"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <div
                                            v-if="form.pass_change == 'On'"
                                            class="col-md-4 col"
                                        >
                                            <div class="form-group">
                                                <label for="confirm_password"
                                                    >Confirm Password *</label
                                                >
                                                <input
                                                    name="password_confirmation"
                                                    v-model="
                                                        form.password_confirmation
                                                    "
                                                    type="password"
                                                    class="form-control"
                                                    id="confirm"
                                                    placeholder="Confirm New Password"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'password_confirmation'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="password_confirmation"
                                                ></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="tile-footer">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update User
                                        </button>
                                    </div>
                                </form>




                    </div>






                </div>
            </div>
        </div>




    </div>
</template>
<script>
import { Form } from "vform";
import { objectToFormData } from "object-to-formdata";
import Multiselect from "vue-multiselect";

export default {
  data() {
    return {
      real_time_photo: "",
      real_photo: "",
      myOptions: {
        layout: {
          color: "black",
          backgroundColor: "lightgray",
          selectedColor: "white",
          selectedBackgroundColor: "green",
          borderColor: "black",
          fontFamily: "Arial",
          fontWeight: "normal",
          fontWeightSelected: "bold",
          squareCorners: false,
          noBorder: true,
        },
        size: {
          fontSize: 0.8,
          height: 2,
          padding: 0.5,
          width: 8,
        },
        items: {
          delay: 0.4,
          preSelected: "unknown",
          disabled: false,
          labels: [
            { name: "Off", color: "white", backgroundColor: "red" },
            { name: "On", color: "white", backgroundColor: "green" },
          ],
        },
      },

      typeOptions: [
        { name: "Backend Developer" },
        { name: "Forntend Developer" },
        { name: "Full Stack Developer" },
        { name: "UI/UX" },
        { name: "Designer" },
        { name: "QA" },
        { name: "App Developer" },
      ],

      roleOptions: [
        { name: "Admin" },
        { name: "Operator" },
        { name: "Developer" },
        { name: "Client" },
      ],

      form: new Form({
        name: "",
        email: "",
        types: [],
        roles: [],
        contact_no: "",
        gender: "Male",
        pass_change: "Off",
        old_password: "",
        password: "",
        password_confirmation: "",
      }),
      img: new Form({
        photo: "",
      }),
    };
  },
  methods: {
    editUser() {
      let id = this.$route.params.id;

      axios.get(`/api/user/${id}/edit`).then((response) => {
        this.form.name = response.data[0].name;
        this.form.email = response.data[0].email;
        this.form.user_type = response.data[0].type_id;
        this.form.contact_no = response.data[0].contact_no;
        this.form.gender = response.data[0].gender;
        this.real_photo = response.data[0].photo;
        this.form.roles = response.data[0].roles;
        this.form.types = response.data[0].types;
      });
    },
    updateUser() {
      let id = this.$route.params.id;

      if (!this.img.photo == "") {
        this.img
          .post(`/api/users/update/${id}`, {
            transformRequest: [
              function (data, headers) {
                return objectToFormData(data);
              },
            ],
          })
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            if (error.response.data.errors.photo) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.photo[0],
              });
            }
          });
      }
      this.form
        .put(`/api/user/${id}`)
        .then((response) => {
          this.$toast.success({
            title: "SUCCESS",
            message: "User Created Successfully",
          });
        })
        .catch((error) => {
          if (error) {
            if (error.response.data.errors.name) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.name[0],
              });
            }
            if (error.response.data.errors.email) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.email[0],
              });
            }
            if (error.response.data.errors.user_type) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.user_type[0],
              });
            }
            if (error.response.data.errors.photo) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.photo[0],
              });
            }
            if (error.response.data.errors.password) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.password[0],
              });
            }
            if (error.response.data.errors.old_password) {
              this.$toast.error({
                title: "! ERRORS",
                message: error.response.data.errors.old_password[0],
              });
            }
          }
        });
    },

    //form img feld on chang
    onImageChange(event) {
      //object to form data
      const file = event.target.files[0];
      // Do some client side validation...
      this.img.photo = file;

      // show uploading file
      var input = event.target;
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader();
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = (e) => {
          // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
          // Read image as base64 and set to imageData
          this.real_time_photo = e.target.result;
        };
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0]);
      }
    },
  },
  mounted() {
    this.editUser();
  },
  components: {
    Multiselect,
  },
};
</script>

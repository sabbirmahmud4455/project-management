<template>
  <div>
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Sprint Update Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">
            <i class="fa fa-home" aria-hidden="true"></i>
          </router-link>
        </li>
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'sprints' }"> Sprints </router-link>
        </li>
        <li class="breadcrumb-item active">Update Sprint</li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Sprint Create</h3>
          <div class="tile-body">
            <form
              @submit.prevent="UpdateSprint()"
              @keydown="form.onKeydown($event)"
            >
              <div class="card-body row">
                <div class="col-md-6 col">
                  <div class="form-group">
                    <label for="Sprint_name">Name *</label>
                    <input
                      v-model="form.name"
                      type="text"
                      name="name"
                      class="form-control"
                      placeholder="Enter Name"
                      :class="{
                        'is-invalid': form.errors.has('name'),
                      }"
                    />
                    <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
                <div class="col-md-6 col">
                  <div class="form-group">
                    <label for="Sprint_type">Type</label>
                    <input
                      v-model="form.type"
                      type="text"
                      name="type"
                      class="form-control"
                      id="Sprint_type"
                      placeholder="Enter type"
                      :class="{
                        'is-invalid': form.errors.has('type'),
                      }"
                    />
                    <has-error :form="form" field="type"></has-error>
                  </div>
                </div>

                <div class="col-md-6 col">
                  <div class="form-group">
                    <label>Start Date</label>
                    <div class="form-control">
                      <VueDatePicker
                        v-model="form.start_date"
                        placeholder="Choose date"
                        clearable
                      />
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col">
                  <div class="form-group">
                    <label>End Date</label>
                    <div class="form-control">
                      <VueDatePicker
                        v-model="form.end_date"
                        placeholder="Choose date"
                        clearable
                      />
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Duration</label>
                    <input
                      v-model="form.duration"
                      type="text"
                      name=""
                      id=""
                      class="form-control"
                      placeholder="Duration"
                      aria-describedby="helpId"
                    />
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Purposes</label>
                    <input
                      v-model="form.purposes"
                      type="text"
                      class="form-control"
                      placeholder="Purposes"
                      aria-describedby="helpId"
                    />
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">Description</label>
                    <vue-editor v-model="form.description" />
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="tile-footer">
                <button type="submit" class="btn btn-primary">
                  Update Sprint
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

import { VueDatePicker } from "@mathieustan/vue-datepicker";
import "@mathieustan/vue-datepicker/dist/vue-datepicker.min.css";
import { VueEditor } from "vue2-editor";

export default {
  data() {
    return {
      sprintID: this.$route.params.id,
      form: new Form({
        name: null,
        type: null,
        duration: null,
        purposes: null,
        start_date: null,
        end_date: null,
        description: "",
      }),
    };
  },
  methods: {
    editSprint() {
      axios.get(`/api/sprint/${this.sprintID}/edit`).then((res) => {
        this.form.name = res.data.name;
        this.form.type = res.data.type;
        this.form.start_date = res.data.start_date;
        this.form.end_date = res.data.end_date;
        this.form.duration = res.data.duration;
        this.form.purposes = res.data.purposes;
        this.form.description = res.data.description;
      });
    },

    UpdateSprint() {
      this.form
        .put(`/api/sprint/${this.sprintID}`)
        .then((response) => {
          this.form.name = null;
          this.form.type = null;
          this.form.start_date = null;
          this.form.end_date = null;
          this.form.duration = null;
          this.form.purposes = null;
          this.form.description = null;
          this.$toast.success({
            title: "SUCCESS",
            message: "Sprint Updated Successfully",
          });
        })
        .catch((error) => {
          if (error.response.data.errors.name) {
            this.$toast.error({
              title: "! ERRORS",
              message: error.response.data.errors.name[0],
            });
          }
        });
    },
  },

  components: {
    VueDatePicker,
    VueEditor,
  },
  mounted() {
    this.editSprint();
  },
};
</script>

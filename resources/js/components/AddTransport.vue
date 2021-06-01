<template>
  <div class="container">
    <h1 class="text-center mt-4">Добавление транспорта</h1>
    <router-link class="btn btn btn-secondary" role="button" to="/transports">Назад</router-link>

    <form class="mt-3" id="validateForm" @submit.prevent="saveTransport" enctype="multipart/form-data" novalidate>

      <div class="alert alert-danger" v-if="errors.length">
        <ul class="mb-0">
          <li v-for="(error, index) in errors" :key="index">
            {{ error }}
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col">
          <input id="license_plate" v-model="transport.license_plate"
                 value=""
                 type="text" class="form-control" placeholder="Номер" aria-label="license_plate">
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <h4>Статус</h4>
          <select class="form-select" aria-label="example" id="status" v-model="transport.status">
            <option value="активная" selected>активная</option>
            <option value="на ремонте">на ремонте</option>
            <option value="продана">продана</option>
            <option value="не используется">не используется</option>
          </select>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <h4>Вид транспорта</h4>
          <select class="form-select" id="kind_id" v-model="transport.kind_id">
            <option v-for="transportKind in transportKinds" :key="transportKind.id" :value="transportKind.id">{{ transportKind.transport_kind }}</option>
          </select>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <h4>Водитель</h4>
          <select class="form-select" id="driver_id" v-model="transport.driver_id">
            <option v-for="driver in drivers" :key="driver.id" :value="driver.id">{{ driver.name }}</option>
          </select>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <button class="btn btn-success">Добавить</button>
        </div>
      </div>

    </form>

  </div>
</template>


<script>
export default {
  name: "AddTransport",
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      let url = this.url + '/api/getTransportKinds';
      this.axios.get(url).then(response => {
        this.transportKinds = response.data;
        // console.log(this.transportKinds);
      });
      let url2 = this.url + '/api/getDrivers';
      this.axios.get(url2).then(response => {
        this.drivers = response.data;
        // console.log(this.drivers);
      });

    },
    saveTransport() {
      this.errors = [];
      if (!this.transport.license_plate) {
        this.errors.push('Номер обязательное поле');
      }
      if (!this.transport.status) {
        this.errors.push('Статус обязательное поле');
      }
      if (!this.transport.kind_id) {
        this.errors.push('Вид транспорта обязательное поле');
      }

      if (!this.errors.length) {
        let formData = new FormData();
        formData.append('license_plate', this.transport.license_plate);
        formData.append('status', this.transport.status);
        formData.append('kind_id', this.transport.kind_id);
        formData.append('driver_id', this.transport.driver_id);

        let url = this.url + '/api/save_transport';

        this.axios.post(url, formData).then((response) => {
          if (response.status) {
            this.$utils.showSeccess('success', response.message);
            // document.getElementById("license_plate").value = "";
            // document.getElementById("status").value = "";
            // document.getElementById("kind_id").value = "";
            // document.getElementById("driver_id").value = "";
            this.$router.push({
              name: '/transports'
            });
          } else {
            this.$utils.showError('error', response.message);
          }
        }).catch(error => {
          this.errors.push(error.response.data.error);
        });
      }
    }
  },
  mounted: function () {
    console.log('add transport component loaded');
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      transportKinds: [],
      drivers: [],
      transport: {},
      license_plate: '',
      status: '',
      driver_id: '',
      kind_id: '',
      errors: []
    }
  }
}
</script>

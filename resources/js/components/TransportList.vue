<template lang="html">
  <div class="container">
    <h2 class="text-center mt-4">Транспорт</h2>

    <router-link class="btn btn-primary" role="button" to="/add_transport">Добавить транспорт</router-link>

    <table class="table table-sm mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Номер</th>
          <th scope="col">Статус</th>
          <th scope="col">Вид транспорта</th>
          <th scope="col">Действия</th>
        </tr>
      </thead>
      <tbody v-for="transport in transports" :key="transport.id">
        <tr>
          <th scope="row">{{ transport.id }}</th>
          <td>{{ transport.license_plate }}</td>
          <td>{{ transport.status }}</td>
          <td>{{ transport.kind.transport_kind }}</td>
          <td>
              <router-link class="btn btn-warning" :to="{ name: 'get_transport', params: {id: transport.id} }">Редактировать</router-link>
              <button class="btn btn-danger" @click.prevent="deleteTransport(transport.id)">Удалить</button>
          </td>
        </tr>

      </tbody>
    </table>
    <div class="d-flex justify-content-center">

    </div>
  </div>
</template>

<script>
export default {
  name: "Transport",
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      let url = this.url + '/api/getTransports';
      this.axios.get(url).then(response => {
        this.transports = response.data
        // console.log(this.transports);
      });
    },
    deleteTransport(id) {
      let url = this.url + `/api/deleteTransport/${id}`;
      this.axios.delete(url).then(response => {
        if (response.status) {
          this.loadData();
          this.$utils.showSeccess('success', response.message);
        } else {
          this.$utils.showError('error', response.message);
        }
      });
    }
  },
  mounted() {
    console.log('Transport list');
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      transports: []
    }
  }

}
</script>

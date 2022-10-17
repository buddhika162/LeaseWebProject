<template>
  <form @submit.prevent="onSubmit">
    <span class="help is-danger" v-text="errors"></span>

    <div class="field">
      <div class="control">
        <label for="assetId">Asset Id</label>
        <input id="assetId" class="input" type="assetId" placeholder="enter asset Id" v-model="server.assetId" @keydown="errors = ''">

        <label for="name">Name</label>
        <input id="name" class="input" type="name" placeholder="enter name" v-model="server.name" @keydown="errors = ''">

        <label for="brand">Brand</label>
        <input id="brand" class="input" type="brand" placeholder="enter brand" v-model="server.brand" @keydown="errors = ''">
        <div class="col-sm-6">
          <label for="price">Price</label>
          <input id="price" class="input" type="price" placeholder="enter price" v-model="server.price" @keydown="errors = ''">
        </div>

      </div>
    </div>
    <div class="field">
      <table>
        <tr>
          <td class="dropdownTd">
            <div>
              <select v-model="server.ramModules" multiple>
                <template v-for="ramModule in ramModules" :key="ramModule.id">
                  <option :value="ramModule.id">
                    <span>{{ramModule.type}} - </span>
                    <span>{{ramModule.size}} GB</span>
                  </option>
                </template>
              </select>
            </div>
            <div>

            </div>
          </td>
          <td class="selectedValueTD">
          </td>
        </tr>
      </table>



    </div>
    <button id="serverListBtn" href="/"  class="button is-primary" >Server List</button>
    <button class="button is-primary" v-bind:class="{ 'is-loading' : isLoading }" @click="addServer">Add Server</button>
  </form>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      server : {
        assetId: '',
        name: '',
        brand: '',
        price: '',
        ramModules:[]
      },

      errors: '',
      isLoading: false,
      ramModules: [],
    }
  },
  async created () {
    const response = await axios.get('http://localhost:8080/ramModules')
    this.ramModules = response.data
  },
  methods: {
    onSubmit() {
      this.isLoading = true
    },
    async addServer() {
      axios.post('http://localhost:8080/servers', this.server)
          .then(response => {
            this.server.assetId = "";
            this.server.name = "";
            this.server.brand = "";
            this.server.price = "";
            this.server.ramModules = [];
            this.title = ''
            this.isLoading = false
            this.$emit('completed', response.data)
          })
          .catch(error => {
            // handle authentication and validation errors here
            this.errors = error.response.data.errors
            this.isLoading = false
          })
    }
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.field {
  margin-left: 40px;
  margin-right: 40px;
}
.dropdownTd {
  width: 400px;
}
#serverListBtn{
  margin-right: 40px;
}
</style>
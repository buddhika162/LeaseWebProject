<template>
  <div class="container">
  <table class="table">
    <tbody>
    <tr>
      <th>Asset ID</th>
      <th>Name</th>
      <th>Brand</th>
      <th>Ram Modules</th>
      <th>Delete</th>
    </tr>
    <template v-for="server in servers" :key="server.id">
      <tr>
        <td>{{ server.assetId }}</td>
        <td>{{ server.name }}</td>
        <td>{{ server.brand }}</td>
        <td>
          <template v-for="ramModule in server.ramModules" :key="ramModule.ramModuleId">
            <div>
              <span>{{ramModule.type}} - </span>
              <span>{{ramModule.size}} - GB</span>
            </div>
          </template>
        </td>
        <td >
          <button class="btn" id="deleteServer" @click="deleteServer(server.assetId)">Delete</button>
        </td>
      </tr>
    </template>
    </tbody>
  </table>

    <a href="/add" class="button is-primary">Add Server</a>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      servers: {}
    }
  },
  async created () {
    const response = await axios.get('http://localhost:8080/servers')
    this.servers = response.data
  },
  methods: {
    async deleteServer(assetId) {
      axios.delete('http://localhost:8080/servers', {
        'data' : {
          "assetIds": [assetId]
        }

      })
          .then(() => {
           this.servers = this.servers.filter(server=>server.assetId != assetId)
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
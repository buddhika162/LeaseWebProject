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
        <td ></td>
      </tr>
    </template>
    </tbody>
  </table>
    <movie-form @completed="addMovie"></movie-form>

    <a class="button is-primary">Add Server</a>
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
    const response = await axios.get('http://localhost:8000/servers')
    this.servers = response.data
  }
}
</script>
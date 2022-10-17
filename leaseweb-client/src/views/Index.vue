<template>
  <div class="Serves">
    <ServersList/>

  </div>
  <router-link to="/add">Add Server</router-link>
  <router-view/>
</template>

<script>

import RouterLink from '../router'
import ServersList from '@/components/ServersList.vue'

export default {
  name: 'ServersHome',
  components: {
    ServersList,
    RouterLink
  }
}

</script>
<template>
  <div class="Serves">
    <ServersList/>
  </div>
</template>

<script>


import ServersList from '@/components/ServersList.vue'

export default {
  name: 'ServersHome',
  components: {
    ServersList
  }
}

</script>
<template>
  <form @submit.prevent="onSubmit">
    <span class="help is-danger" v-text="errors"></span>

    <div class="field">
      <div class="control">
        <label for="assetId">Asset Id</label>
        <input id="assetId" class="input" type="assetId" placeholder="enter asset Id" v-model="assetId" @keydown="errors = ''">

        <label for="name">Name</label>
        <input id="name" class="input" type="name" placeholder="enter name" v-model="name" @keydown="errors = ''">

        <label for="brand">Brand</label>
        <input id="brand" class="input" type="brand" placeholder="enter brand" v-model="brand" @keydown="errors = ''">
        <div class="col-sm-6">
          <label for="brice">price</label>
          <input id="price" class="input" type="price" placeholder="enter price" v-model="price" @keydown="errors = ''">
        </div>

      </div>
    </div>
    <div>
      <div>Selected: {{ selected }}</div>
      <div>
        <select v-model="selected" multiple>
          <template v-for="ramModule in ramModules" :key="ramModule.id">
            <option>
              <span>{{ramModule.type}} - </span>
              <span>{{ramModule.size}} - GB</span>
            </option>
          </template>
        </select>
      </div>
      <div class="col-sm-12">
        <button class="btn" id="addRamModule" @click="addRamModule()">Add Ram Modules</button>
      </div>
    </div>

    <button class="button is-primary" v-bind:class="{ 'is-loading' : isLoading }">Add Server</button>
  </form>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      assetId: '',
      name: '',
      brand: '',
      price: '',
      errors: '',
      isLoading: false,
      ramModules: [],
      selected:[]
    }
  },
  async created () {
    const response = await axios.get('http://localhost:8000/ramModules')
    this.ramModules = response.data
  },
  methods: {
    onSubmit() {
      this.isLoading = true
      this.postMovie()
    },
    async postMovie() {
      axios.post('http://localhost:8000/servers', this.$data)
          .then(response => {
            this.title = ''
            this.isLoading = false
            this.$emit('completed', response.data)
          })
          .catch(error => {
            // handle authentication and validation errors here
            this.errors = error.response.data.errors
            this.isLoading = false
          })
    },
    addRamModule() {
      if (this.quantity && this.selectedRamId) {
        let selectedRam = this.rams.find((element) => {
          return this.selectedRamId === element.id
        })
        selectedRam.quantity = this.quantity
        this.selectedRams.push(selectedRam)
        this.selectedRamIds.push(this.selectedRamId)
        this.quantity = null
        this.selectedRamId = null
      } else {
        if (!this.quantity) {
          alert('Please add a valid quantity')
        } else if (!this.selectedRamId) {
          alert('Please select a ram module')
        }
      }
    },
  }
}
</script>
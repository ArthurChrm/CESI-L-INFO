<template>
  <v-card class="mx-auto">
    <!-- Image user -->
    <v-img
      class="white--text align-end"
      height="50px"
      src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
    >
      <!-- Info user -->
      <v-card-title>{{name}} </v-card-title>
    </v-img>

    <v-card-subtitle class="pb-0">{{ firstname }}</v-card-subtitle>

    <v-card-text class="text--primary">
      <div>{{ email }}</div>

      <div>{{ address }}</div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "TrombiComponent",
  props: {
    name: String,
    firstname: String,
    email: String,
    address: String,
    telephone: String
  }
};
</script>

<style scoped>
</style>

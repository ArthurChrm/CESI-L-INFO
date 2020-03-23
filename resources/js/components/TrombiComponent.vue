<template>
  <v-card class="mx-auto">
    <!-- Image user TODO:
    ajout du lien vers la photo user
    -->
    <v-img class="white--text align-end" height="200" width="200" src="https://cdn.vuetifyjs.com/images/cards/store.jpg"></v-img>
    <!-- Info user -->
    <v-card-title> {{ First }} {{ Name }}  </v-card-title>

    <v-card-text class="text--primary">
      <div>{{ Address }}</div>
      <div>{{ Telephone }}</div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "TrombiComponent",
  props: {
    Name: String,
    First: String,
    Address: String,
    Telephone: String
  }
};
</script>

<style scoped>
</style>

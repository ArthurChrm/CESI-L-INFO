<template>
  <v-card class="mx-auto">
    <!-- Image user -->
    <v-img
      class="white--text align-end"
      height="50px"
      src=""
    >
    </v-img>
      <!-- Info user -->
      <v-card-title>{{ Name }} </v-card-title>
    <v-card-subtitle class="pb-0">{{ First }}</v-card-subtitle>

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

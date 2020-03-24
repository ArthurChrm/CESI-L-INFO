<template>
  <!-- It's a container card which contains Firstname and NAME; the user image with link to database remains in TODO -->
  <v-card class="pa-2" height="auto" width="auto">
    <!-- Image user TODO:
    src = require(@/public/storage/user.jpg)
    which should be register by src=""
    -->
    <v-img src="http://icon-library.com/images/unknown-person-icon/unknown-person-icon-16.jpg"></v-img>
    <v-card-subtitle class="text-center">
      {{ First }}
      <div class="text-uppercase">{{ Name }}</div>
    </v-card-subtitle>

    <!-- Info user which can be added : phone number or the company of the user -->
    <!-- <v-card-text class="text--primary">
          <div>{{ Address }}</div>
          <div>{{ Telephone }}</div>
    </v-card-text>-->
  </v-card>
</template>

<script>
// We retrieve user's information (name & firstname)
// TODO : Add a link to get image from users in database and add it to the props
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

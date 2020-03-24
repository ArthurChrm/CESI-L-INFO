<template>
<v-card
    class="mx-5"
    min-width="20em"
  >
    <v-card-title>
      {{TitleEvent}}
    </v-card-title>

    <v-card-subtitle>
      {{DateEvent}}
    </v-card-subtitle>

    <v-spacer></v-spacer>

    <v-card-actions>
        <v-btn @click="show = !show">
            <v-icon>fa-chevron-down</v-icon>
        </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>
        <v-card-text>
          {{DescEvent}}
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>

<script>
export default {
    name: "CardEventComponent",
    props: {
        TitleEvent : String,
        DateEvent : String,
        DescEvent : String
    },
    data: () => ({
      show: false,
    }),
  }
</script>

<style scoped>

</style>

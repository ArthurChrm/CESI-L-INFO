<template>
  <v-card class="ma-" min-width="25em" outlined>
    <v-form>
      <!-- Vue liste messages -->
      <v-container>
        <v-row>
          <v-col cols="12">
            <v-card-text>
                <!-- Affichage info user (image / nom) -->
                <div class="d-flex flex-row mt-2">
                    <h5>{{user}}</h5>
                    <p>{{message}}</p>
                </div>
            </v-card-text>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </v-card>
</template>

<style scoped>

</style>



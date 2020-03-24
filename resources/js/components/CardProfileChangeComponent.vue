<template>
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on }" > 
            <v-btn
              class="pa-0 green darken-2"
              min-width="25px"
              max-height="25px"
              v-on="on"
              >              
              <div>
               <i class="fas fa-pencil-alt"></i>
              </div>
            </v-btn>
      </template>

      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
          Changez votre {{name}}
        </v-card-title>
        <v-textarea
          background-color="grey lighten-2"
          color="cyan"
          label=""
          max-height="70px"
        >
        </v-textarea>

        <v-card-actions class="pa-0">
        <div style="display: flex; flex-direction: column; width: 100%">
          <v-btn
            color="green darken-2"
            width="100%"
            block
            @click="dialog = false"
          >
            Valider
          </v-btn>
          <v-btn
            color="red darken-2"
            width="100%"
            block
            @click="dialog = false"
          >
            Fermer
          </v-btn>
          </div>
        </v-card-actions>
      </v-card>
    </v-dialog>

</template>
<script>
export default {
    name:"CardProfileChangeComponent",
    props : {
      name: String
    },
    data () {
      return {
        dialog: false,
      }
    },
  }

</script>

<style scoped>

</style>

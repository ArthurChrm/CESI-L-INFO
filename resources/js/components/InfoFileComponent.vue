<template>
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on }" >
          <v-btn width="100%" class="blue darken-2" v-on="on">
                <div>
                    <i class="fas fa-question-circle" size=3x></i>
                    Plus d'infos
                </div>
            </v-btn>
      </template>

      <v-card>
        <v-card-title
          class="headline grey lighten-2"
          primary-title
        >
          {{nameFile}}
        </v-card-title>

        <v-card-text>
        <div>
            <div class="d-flex flex-row mt-2">
                <h5>Extension du fichier : </h5><h5 class="ml-4">{{typeFile}}</h5>
            </div>
            <div class="d-flex flex-row mt-2">
                <h5>Taille du fichier : </h5><h5 class="ml-4">{{sizeFile}}</h5>
            </div>
            <div class="d-flex flex-row mt-2">
                <h5>Date de création : </h5><h5 class="ml-4">{{dateFile}}</h5>
            </div>
            <div class="d-flex flex-row mt-2">
                <h5>Emetteur : </h5><h5 class="ml-4">{{transmitter}}</h5>
            </div>
            <v-actions>
                <v-btn class="teal lighten-1 mt-5">
                    <div>
                        <i class="fas fa-file-download" size="3x"></i>
                        Télécharger
                    </div>
                </v-btn>
            </v-actions>
        </div>
        </v-card-text>
        <v-card-actions class="pa-0">
          <v-btn
            color="red darken-2"
            width="100%"
            block
            @click="dialog = false"
          >
            Fermer
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

</template>
<script>
export default {
    name:"InfoFileComponent",
    props: {
        id: Number,
        nameFile: String,
        typeFile: String,
        sizeFile: Number,
        dateFile: Date,
        transmitter: String
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

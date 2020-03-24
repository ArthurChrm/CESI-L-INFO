<template>
    <v-card class="ma-5" min-width="20em" outlined>
        <v-card-title>
            {{ nameFile }}
        </v-card-title>
        <v-card-subtitle>
            {{ typeFile }}
        </v-card-subtitle>
        <v-card-actions class="d-flex flex-column pa-0" width="100%">
            <info-file-component
                :id="id"
                :name-file="nameFile"
                :type-file="typeFile"
                :date-file="dateFile"
                :size-file="sizeFile"
                :transmitter="transmitterFile"
            >
            </info-file-component>
            <v-btn width="100%" class="teal lighten-1 ma-0">
                <div>
                    <i class="fas fa-file-download" size="3x"></i>
                    Télécharger
                </div>
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import InfoFileComponent from "./InfoFileComponent.vue";
export default {
    name: "CardFileComponent",
    components: { InfoFileComponent },
    props: {
        id: String,
        nameFile: String,
        typeFile: String,
        sizeFile: String,        
        dateFile: String,
        transmitterFile: String
    }
};
</script>

<style scoped></style>

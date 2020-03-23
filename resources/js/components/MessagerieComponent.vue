<template>
    <div>
        <v-card
            height="90%"
            outlined
            width="100%"
        >
            Test
        </v-card>

        <!-- Message text field -->
        <v-row class="ml-1">
            <v-text-field
                outlined
                clearable
                hide-details>

            </v-text-field>
            <v-btn height="auto" class="m-0">
                <v-icon>fa-paper-plane</v-icon>
            </v-btn>
        </v-row>
    </div>
</template>

<script>
    export default {
        name: "MessagerieComponent",
        props: ['salon'],
        data() {
            return {
                message: ''
            }
        },
        created() {
            Echo.channel('salon.'+this.salon.id)
                .listen('MessageSended', (e) => {
                    console.log(e);
                });
        }
    }
</script>

<style scoped>

</style>

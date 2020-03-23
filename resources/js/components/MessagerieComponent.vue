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
                hide-details
                v-model="message">

            </v-text-field>
            <v-btn height="auto" class="m-0" v-on:click="sendMessage">
                <v-icon>fa-paper-plane</v-icon>
            </v-btn>
        </v-row>
    </div>
</template>

<script>
    export default {
        name: "MessagerieComponent",
        props: ['salon_id'],
        data() {
            return {
                message: ''
            }
        },
        created() {
            Echo.private('salon.'+this.salon_id)
                .listen('MessageSended', (e) => {
                    //New messages
                    console.log(e)
                });
        },
        methods: {
            sendMessage(){
                let sender = axios.post('/message',{
                    Salon : this.salon_id,
                    message : this.message
                });

                sender.then((e) => {
                    //Check if failed or success
                });
            }
        }
    }
</script>

<style scoped>

</style>

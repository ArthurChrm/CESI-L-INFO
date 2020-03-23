<template>
    <v-card
        min-height="100%"
        outlined
        width="100%">

        <v-card id="chatfield" class="pl-10 pt-10 pr-10">
            <v-spacer></v-spacer>
            <div v-for="msg in messages">
                <!-- Message entrant -->
                <v-row align="center" class="mb-3" v-if="msg.sender_id !== user_id">
                    <v-col class="col-auto">
                        <v-avatar color="">
                            <v-icon>fa-user</v-icon>
                        </v-avatar>
                    </v-col>

                    <v-card outlined>
                        <v-card-text>{{ msg.text }}</v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions class="pl-5 pr-5 pt-5 pb-5" v-if="Object.keys(msg.files).length !== 0 || Object.keys(msg.events).length !== 0">
                            <v-spacer></v-spacer>
                            <v-badge content="2" overlap color="red" class="mr-3" v-if="Object.keys(msg.files).length !== 0">
                                <v-btn icon>
                                    <v-icon>fa-file-alt</v-icon>
                                </v-btn>
                            </v-badge>
                            <v-badge content="1" overlap color="red" v-if="Object.keys(msg.events).length !== 0">
                                <v-btn icon>
                                    <v-icon>fa-calendar-alt</v-icon>
                                </v-btn>
                            </v-badge>
                        </v-card-actions>
                    </v-card>
                    <v-spacer></v-spacer>
                </v-row>

                <!-- Message sortant -->
                <v-row align="center" class="mb-3" v-if="msg.sender_id === user_id">
                    <v-spacer></v-spacer>
                    <v-card outlined :loading="msg.loading">
                        <v-card-text>{{ msg.text }}</v-card-text>
                        <v-divider></v-divider>
                    </v-card>
                    <v-col class="col-auto">
                        <v-avatar color="">
                            <v-icon>fa-user</v-icon>
                        </v-avatar>
                    </v-col>
                </v-row>
            </div>
        </v-card>

        <!-- Message text field -->
        <v-row class="pl-3 pr-3" id="textfield">
                <v-text-field
                    outlined
                    clearable
                    hide-details
                    v-model="message">

                </v-text-field>
                <v-btn height="auto" class="ml-1" v-on:click="sendMessage">
                    <v-icon>fa-paper-plane</v-icon>
                </v-btn>
        </v-row>
    </v-card>
</template>

<script>
    export default {
        name: "MessagerieComponent",
        props:{
            salon_id: Number,
            user_id: Number
        },
        data() {
            return {
                message: '',
                messages: []
            }
        },
        mounted() {

        },
        created() {
            //Get older messages from database
            axios.get('/message/salon/'+this.salon_id)
                .then((e) => {
                    e.data.forEach((msg) => {
                        this.messages.push({
                            id : msg.id,
                            sender_id: msg.id_recipient,
                            room_id: msg.salon_id,
                            text: msg.content,
                            date: msg.created_at,
                            file: msg.files,
                            events: msg.events,
                        });
                    });
                });

            //Create listener for new messages
            Echo.private('salon.'+this.salon_id)
                .listen('MessageSended', (e) => {
                    //New messages
                    if(e.sender_id === this.user_id){
                        this.messages = this.messages.filter(x => x.id !== -1);
                    }
                    this.messages.push(e);
                });
        },
        methods: {
            sendMessage(){
                let sender = axios.post('/message',{
                    Salon : this.salon_id,
                    message : this.message
                });

                let temp_message = {
                    id : -1,
                    sender_id: this.user_id,
                    room_id: this.salon_id,
                    text: this.message,
                    date: Date.now(),
                    file: {},
                    events: {},
                    loading: true
                };

                this.messages.push(temp_message);

                sender.then((e) => {
                    //Check if send failed or success
                    if(e.status === 200){
                        console.log("success");
                    }else{
                        console.log("fail");
                    }
                    this.scrollBottom();
                });
            },
            scrollBottom(){
                let container = this.$el.querySelector("#chatfield");
                container.scrollTop = container.scrollHeight;
            }
        }
    }
</script>

<style scoped>
    #chatfield{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 60px;

        overflow-x: hidden;
        overflow-y: scroll;
    }

    #textfield{
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>

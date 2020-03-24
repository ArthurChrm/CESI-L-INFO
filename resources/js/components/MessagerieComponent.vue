<template>
    <v-card
        min-height="100%"
        outlined
        width="100%">
        <v-card id="chatfield" class="pl-10 pt-10 pr-10">
            <!-- Load older messages -->
            <div align="center">
                <v-tooltip bottom>
                    <template v-slot:activator="{on}">
                        <v-btn
                            v-on="on"
                            fab
                            :loading="loadOldBtnLoading"
                            v-on:click="loadOlderMessage(false)">
                            <v-icon>fa-angle-double-up</v-icon>
                        </v-btn>
                    </template>
                    <span>Charger les anciens messages</span>
                </v-tooltip>
            </div>

            <!-- Message list -->
            <div v-for="msg in messages" v-scroll:#chatfield="onScroll">
                <!-- Message from another user -->
                <v-row align="center" class="mb-3" v-if="msg.id_recipient !== user_id">
                    <v-col class="col-auto">
                        <v-avatar color="">
                            <v-icon>fa-user</v-icon>
                        </v-avatar>
                    </v-col>

                    <v-card outlined>
                        <v-card-text>{{ msg.content }}</v-card-text>
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

                <!-- Message from current auth user -->
                <v-row align="center" class="mb-3" v-if="msg.id_recipient === user_id">
                    <v-spacer></v-spacer>
                    <v-card outlined :loading="msg.loading">
                        <v-card-text>{{ msg.content }}</v-card-text>
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
                    prepend-inner-icon="fa-plus-circle"
                    outlined
                    clearable
                    hide-details
                    v-model="message"
                    v-on:keypress.enter="sendMessage">

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
                message: '', //Text field message
                messages: [], //Array with all the chat messages
                offsetTop: 0, //Scroll y
                currentPage: -1, //Current database page
                loadOldBtnLoading: false
            }
        },
        created() {
            //Search page count for loading older messages
            axios.get('/message/salon/'+this.salon_id,{
                params: {
                    paginate: true
                }
            }).then((e) => {
                this.currentPage = e.data.last_page;
                this.loadOlderMessage(true);
            });

            //Create listener for new messages
            Echo.private('salon.'+this.salon_id)
                .listen('MessageSended', (e) => {
                    //New messages
                    if(e.id_recipient === this.user_id){
                        this.messages = this.messages.filter(x => x.id !== -1);
                    }
                    this.messages.push(e);
                });
        },
        methods: {
            onScroll(e){
                this.offsetTop = e.target.scrollTop;
                console.log(this.offsetTop);
            },
            loadOlderMessage(initial_load){ //Get older messages from database
                if(!initial_load) this.loadOldBtnLoading = true; //Start button loading
                let older_messages = [];
                //Query messages from this room
                axios.get('/message/salon/'+this.salon_id,{
                    params: {
                        paginate: true,
                        page: this.currentPage
                    }
                })
                    .then((e) => {
                        //Push messages to the main array
                        e.data.data.forEach((msg) => {
                            if(initial_load){
                                this.messages.push(msg);
                            }else{
                                older_messages.push(msg);
                            }
                        });

                        //Reverse and add older message into main array
                        older_messages.reverse();
                        older_messages.forEach((msg) => {
                            //Add older messages at the start of the main array
                            this.messages.unshift(msg);
                        });
                        if(!initial_load) this.loadOldBtnLoading = false;
                    });
                this.currentPage--;
            },
            sendMessage(){
                //Send text message to message api
                let sender = axios.post('/message',{
                    Salon : this.salon_id,
                    message : this.message
                });

                //Create a fake message to wait for message to be processed
                let temp_message = {
                    id : -1,
                    id_recipient: this.user_id,
                    salon_id: this.salon_id,
                    content: this.message,
                    created_at: Date.now(),
                    files: {},
                    events: {},
                    loading: true
                };
                this.messages.push(temp_message);
                this.message = ""; //Clear text field

                //Check of sending status
                sender.then((e) => {
                    //Check if send failed or success
                    if(e.status === 200){
                        //Do nothing
                        console.log("success");
                    }else{
                        //Show error and ask for resend
                        console.log("fail");
                    }
                    //Scroll to bottom to show the new message
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

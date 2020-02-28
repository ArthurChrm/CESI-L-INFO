<template>
    <v-card
        tile>
        <v-app-bar
            app
            clipped-left
            dark
        >
            <v-app-bar-nav-icon @click="openCloseNav">
                <v-icon>fa-bars</v-icon>
            </v-app-bar-nav-icon>

            <v-toolbar-items></v-toolbar-items>

            <v-spacer></v-spacer>

            <v-menu :close-on-content-click="false" offset-y>
                <template v-slot:activator="{ on }">
                    <v-btn
                        dark
                        icon
                        v-on="on"
                    >
                        <v-icon>fa-ellipsis-v</v-icon>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>fa-adjust</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            Mode sombre
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-switch inset
                                v-model="darkMode"
                                      @change="darkModeSwitch"
                            ></v-switch>
                        </v-list-item-action>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
        <v-navigation-drawer app
                             clipped
                             v-model="drawer"
                             width="auto"
        >
            <v-row class="fill-height" no-gutters>
                <v-navigation-drawer
                    dark
                    :expand-on-hover="activateHover"
                    :mini-variant="!activateHover"
                    v-model="drawer"
                    stateless
                >
                    <v-list>
                        <v-list-item class="px-2">
                            <v-list-item-avatar>
                                <v-img src="https://randomuser.me/api/portraits/women/75.jpg"></v-img>
                            </v-list-item-avatar>
                        </v-list-item>
                        <v-list-item link>
                            <v-list-item-content>
                                <v-list-item-title class="title">Sandra Adams</v-list-item-title>
                                <v-list-item-subtitle>sandra_a88@gmail.com</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>


                    <v-divider></v-divider>

                    <v-list
                        dense
                        nav
                    >

                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            @click=""
                        >
                            <v-list-item-action>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-action>

                            <v-list-item-content>
                                <v-list-item-title>{{ item.title }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-divider></v-divider>
                        <v-list-item
                            v-for="item in items_2"
                            :key="item.title"
                            @click=""
                        >
                            <v-list-item-action>
                                <v-icon>{{ item.icon }}</v-icon>
                            </v-list-item-action>

                            <v-list-item-content>
                                <v-list-item-title>{{ item.title }}</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-navigation-drawer>
                <v-list class="grow p-0">
                    <v-toolbar class="m-0"
                        flat
                    >
                        <v-text-field
                            hide-details
                            prepend-icon="fa-search"
                            single-line
                        ></v-text-field>
                        <v-btn icon>
                            <v-icon>fa-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider></v-divider>
                    <v-subheader>Groupes</v-subheader>
                    <v-list-item
                        v-for="link in links"
                        :key="link"
                        link
                    >
                        <v-list-item-avatar>
                            <v-img src="https://randomuser.me/api/portraits/women/75.jpg"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-title v-text="link"></v-list-item-title>

                    </v-list-item>
                </v-list>
            </v-row>
        </v-navigation-drawer>
    </v-card>
</template>

<script>
    export default {
        name: "NavComponent",
        data() {
            return {
                items: [
                    {title: 'Discussions', icon: 'fa-comments'},
                    {title: 'Fichiers', icon: 'fa-file-alt'},
                    {title: 'Evenements', icon: 'fa-calendar-alt'},
                ],
                items_2: [
                    {title: 'Profile', icon: 'fa-user-circle'},
                    {title: 'Se déconnecter', icon: 'fa-sign-out-alt'},
                ],
                links: ['Group 1', 'Group 2'],
                mini: true,
                drawer: true,
                navWidth: 'auto',
                darkMode: false
            }
        },
        methods:{
            openCloseNav(){
                this.drawer = !this.drawer;
            },
            darkModeSwitch(){
                this.$vuetify.theme.dark = this.darkMode;
            }
        },
        mounted() {
            document.onreadystatechange = () => {
                if (document.readyState === "complete") {
                    if(this.drawer){
                        // Close and re-open to fix v-content
                        this.openCloseNav();
                        setTimeout(() => this.openCloseNav(), 500);
                    }
                }
            }
        },
        computed: {
            //Disable nav hover on small devices
            activateHover () {
                switch (this.$vuetify.breakpoint.name) {
                    case 'xs': return false;
                    default: return true;
                }
            },
        },
    }
</script>

<style scoped>

</style>

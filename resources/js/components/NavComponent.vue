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
        </v-app-bar>
        <v-navigation-drawer app
                             clipped
                             v-model="drawer"
                             width="33%"
        >
            <v-row class="fill-height" no-gutters>
                <v-navigation-drawer
                    dark
                    expand-on-hover
                    mini-variant-width="53"
                    v-model="drawer"
                >
                    <v-list-item class="px-2">
                        <v-list-item-avatar>
                            <v-img src="https://randomuser.me/api/portraits/women/75.jpg"></v-img>
                        </v-list-item-avatar>
                    </v-list-item>

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
                navWidth: '30%'
            }
        },
        methods:{
            openCloseNav(){
                this.drawer = !this.drawer;
            }
        }
    }
</script>

<style scoped>

</style>

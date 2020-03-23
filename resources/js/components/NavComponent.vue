<template>
    <v-card
        tile>
        <v-overlay :value="loading">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
        <v-app-bar
            app
            clipped-left
            dark
        >
            <v-app-bar-nav-icon @click="openCloseNav">
                <v-icon>fa-bars</v-icon>
            </v-app-bar-nav-icon>

            <v-spacer></v-spacer>

            <v-btn-toggle
                v-for="item in primary_links"
                :key="item.title"
                :href="item.link"
                mandatory
            >
                <v-btn>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-btn>
            </v-btn-toggle>
            
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
                                <v-img :src="user.profile_img"></v-img>
                            </v-list-item-avatar>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">{{user.fullname}}</v-list-item-title>
                                <v-list-item-subtitle>{{user.email}}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>


                    <v-divider></v-divider>

                    <v-list
                        dense
                        nav
                    >

                        <v-list-item
                            v-for="item in primary_links"
                            :key="item.title"
                            :href="item.link"
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
                            v-for="item in secondary_links"
                            :key="item.title"
                            :href="item.link"
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
                            v-model="searchQuery"
                            placeholder="Rechercher un groupe"
                        ></v-text-field>
                        <v-btn icon>
                            <v-icon>fa-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider></v-divider>
                    <v-subheader>Groupes</v-subheader>
                    <v-list-item
                        v-for="group in resultQuery"
                        :key="group.name"
                        :href="group.link"
                        link
                    >
                        <v-list-item-avatar>
                            <v-img :src="group.img"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-title>{{group.name}}</v-list-item-title>

                    </v-list-item>
                </v-list>
            </v-row>
        </v-navigation-drawer>
    </v-card>
</template>

<script>
    export default {
        name: "NavComponent",
        props: ['fullname', 'email'],
        data() {
            return {
                user: {fullname:this.fullname, email:this.email, profile_img:'https://randomuser.me/api/portraits/women/75.jpg'},
                primary_links: [
                    {title: 'Discussions', icon: 'fa-comments',link:'http://cesi-l-info.test/message'},
                    {title: 'Fichiers', icon: 'fa-file-alt',link:'http://cesi-l-info.test/files'},
                    {title: 'Evenements', icon: 'fa-calendar-alt',link:'http://cesi-l-info.test/evenement'},
                ],
                secondary_links: [
                    {title: 'Profile', icon: 'fa-user-circle',link:'#'},
                    {title: 'Se déconnecter', icon: 'fa-sign-out-alt',link:'#'},
                ],
                groups: [
                    {name: 'Group 1',img: 'https://randomuser.me/api/portraits/women/75.jpg',link:'http://cesi-l-info.test/message/salon/1'},
                    {name: 'Group 2',img: 'https://randomuser.me/api/portraits/women/75.jpg',link:'http://cesi-l-info.test/message/salon/2'},
                    {name: 'Group 3',img: 'https://randomuser.me/api/portraits/women/75.jpg',link:'http://cesi-l-info.test/message/salon/3'}
                ],
                mini: true,
                drawer: true,
                darkMode: false,
                loading: true,
                searchQuery: null //Result of search bar
            }
        },
        methods: {
            //Open / Close left navigation
            openCloseNav() {
                this.drawer = !this.drawer;
            },
            //Activate / Disable dark mode
            darkModeSwitch() {
                this.$vuetify.theme.dark = this.darkMode;
            }
        },
        mounted() {
            document.onreadystatechange = () => {
                if (document.readyState === "complete") {
                    if (this.drawer) {
                        // Close and re-open to fix v-content
                        this.openCloseNav();
                        setTimeout(() => this.loading = false, 500);
                        setTimeout(() => this.openCloseNav(), 500);
                    }
                }
            };
        },
        computed: {
            //Disable nav hover on small devices
            activateHover() {
                return this.$vuetify.breakpoint.name !== 'xs';
            },
            //Search bar query filter
            resultQuery(){
                if(this.searchQuery){
                    return this.groups.filter((item)=>{
                        return this.searchQuery.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
                    })
                }else{
                    return this.groups;
                }
            }
        },
    }
</script>

<style scoped>
    [v-cloak] {
        display: none !important;
    }
</style>

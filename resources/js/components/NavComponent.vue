<template>
    <v-navigation-drawer app
        permanent
        width="30%"
    >
        <v-row class="fill-height" no-gutters>
            <v-navigation-drawer
                dark
                mini-variant
                mini-variant-width="56"
                permanent
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

            <v-list class="grow">
                <v-list-item
                    v-for="link in links"
                    :key="link"
                    link
                >
                    <v-list-item-title v-text="link"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-row>
    </v-navigation-drawer>
</template>

<script>
    export default {
        name: "NavComponent",
        data () {
            return {
                items: [
                    { title: 'Discussions', icon: 'fa-comments' },
                    { title: 'Fichiers', icon: 'fa-file-alt' },
                    { title: 'Evenements', icon: 'fa-calendar-alt' },
                ],
                items_2: [
                    {title: 'Profile', icon: 'fa-user-circle'},
                    {title: 'Se déconnecter', icon: 'fa-sign-out-alt'},
                ],
                links: [],
                mini: true,
            }
        },
    }
</script>

<style scoped>

</style>

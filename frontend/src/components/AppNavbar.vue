<template>
  <v-navigation-drawer v-model="drawer" clipped color="light-blue darken-1">
    <v-list dense>
      <v-list-item>
        <v-row align="center" class="mb-10 mt-5" justify="center">
          <v-col class="text-center" cols="12">
            <v-avatar size="100" class="mb-3">
              <img src="https://via.placeholder.com/100" alt="Avatar">
            </v-avatar>
            <v-list-item-title>Drelciuc Razvan</v-list-item-title>
            <v-list-item-subtitle>Author</v-list-item-subtitle>
          </v-col>
        </v-row>
      </v-list-item>
      <v-divider></v-divider>

      <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :to="item.route"
          link
      >
        <template v-slot:prepend>
          <v-icon>{{ item.icon }}</v-icon>
        </template>
        <v-list-item-title>{{ item.text }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>

  <v-app-bar class="bg-grey-lighten-4">
    <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    <v-toolbar-title>
      <span class="font-weight-light">TodoList</span>
      <span>App</span>
    </v-toolbar-title>
  </v-app-bar>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        {icon: 'mdi-view-dashboard', text: 'Dashboard', route: '/'},
        {icon: 'mdi-home', text: 'About', route: '/about'},
      ],
    }
  },
}
</script>

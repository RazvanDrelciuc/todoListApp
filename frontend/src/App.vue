<template>
  <v-app class="bg-grey-lighten-3">
    <app-navbar/>
    <v-main>
      <router-view class="mx-10 mb-10 mt-10"/>
    </v-main>
  </v-app>
</template>

<script>

import AppNavbar from "@/components/AppNavbar.vue";

export default {
  name: 'App',
  components: {AppNavbar},

  data: () => ({
    //
  }),
}
</script>

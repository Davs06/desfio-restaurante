<script setup lang="ts">
import { RouterView } from "vue-router";
import HomeView from "@/views/HomeView.vue";
import Header from "@/layouts/_partials/header.vue";
</script>

<template>
  <div>
    <Header />

    <router-view></router-view>
  </div>
</template>

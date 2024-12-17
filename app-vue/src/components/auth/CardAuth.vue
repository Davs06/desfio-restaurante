<script setup>
defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <div class="container d-flex justify-content-center my-5">
    <div class="card">
      <div class="card-header d-flex justify-content-center">
        <router-link :to="{ name: 'home' }" style="font-size: 24px; color: black">
          {{ title }}
        </router-link>
      </div>
      <div class="card-body">
        <slot />
      </div>
    </div>
  </div>
</template>

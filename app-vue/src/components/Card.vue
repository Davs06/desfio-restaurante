<script setup>
defineProps({
  title: {
    type: String,
    require: true,
  },
  img: {
    type: String,
    require: true,
  },
});
</script>

<template>
  <div>
    <div class="d-flex justify-content-center my-5 gap-3">
      <div class="card" style="width: 18rem">
        <img :src="img" class="card-img-top" alt="..." />
        <div class="card-body">
          <h4>{{ title }}</h4>
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

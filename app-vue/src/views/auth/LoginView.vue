<script setup lang="ts">
import CardAuth from "@/components/auth/CardAuth.vue";
import FormLogin from "@/components/auth/FormLogin.vue";

const title = "Login";
</script>

<template>
  <div>
    <CardAuth :title="title">
      <FormLogin />
    </CardAuth>
  </div>
</template>

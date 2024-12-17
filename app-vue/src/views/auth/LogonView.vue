<script setup>
import CardAuth from "@/components/auth/CardAuth.vue";
import FormLogon from "@/components/auth/FormLogon.vue";

const title = "Registre-se";
</script>

<template>
  <CardAuth :title="title">
    <FormLogon />
  </CardAuth>
</template>

<style></style>

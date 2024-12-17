<script setup>
import Card from "@/components/Card.vue";
import img from "@/assets/img/img1.jpg";
import img1 from "@/assets/img/img3.jpg";
const title = " Fazer reserva";
const title1 = " Ver suas reservas ";
</script>

<template>
  <main class="container d-flex justify-content-evenly">
    <Card :title="title" :img="img">
      <p>Veja os melhores horarios disponiveis para sua reserva</p>

      <div class="card-footer">
        <router-link class="btn btn-primary" :to="{ name: 'create.reservas' }">
          Fazer reservas
        </router-link>
      </div>
    </Card>

    <Card :title="title1" :img="img1">
      <p>Veja, mude ou cancele suas reservas.</p>

      <div class="card-footer">
        <router-link class="btn btn-primary" :to="{ name: 'show.reservas' }">
          Ver reservas
        </router-link>
      </div>
    </Card>
  </main>
</template>

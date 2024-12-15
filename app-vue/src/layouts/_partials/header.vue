<script setup lang="ts">
import { RouterLink } from "vue-router";
</script>

<template>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <RouterLink :to="{ name: 'home' }" class="navbar-brand">
          <img
            src="https://static.vecteezy.com/ti/vetor-gratis/t2/10411845-restaurante-logo-design-modelo-gratis-vetor.jpg"
            alt="Logo"
            width="50"
            height="34"
            class="d-inline-block align-text-top"
          />
          Davs Resttaurante
        </RouterLink>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <RouterLink :to="{ name: 'home' }" class="green navbar-brand">
                Home
              </RouterLink>
            </li>
          </ul>
          <RouterLink :to="{ name: 'login' }" class="btn btn-outline-success">
            Login
          </RouterLink>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup></script>

<template>
  <div>
    <div class="card m-5">
      <div class="card-header">
        <h2>Escolha o dia e o horario da sua reserva</h2>
      </div>

      <div class="card-body p-5">
        <form action="" method="POST">
          <!-- Seleção de Mesa -->
          <div class="mb-3">
            <label for="mesa_id" class="form-label">Selecione a Mesa</label>
            <select
              id="mesa_id"
              name="mesa_id"
              class="form-control @error('mesa_id') is-invalid @enderror"
              required
            >
              <option value="" disabled selected>Escolha uma mesa</option>
              <option value=""></option>
            </select>
            <div class="invalid-feedback"></div>
          </div>

          <!-- Início da Reserva -->
          <div class="mb-3">
            <label for="inicio_reserva" class="form-label">Início da Reserva</label>
            <input
              type="datetime-local"
              id="inicio_reserva"
              name="inicio_reserva"
              class="form-control @error('inicio_reserva') is-invalid @enderror"
              value="{{ old('inicio_reserva') }}"
              required
            />
            <div class="invalid-feedback"></div>
          </div>

          <!-- Fim da Reserva -->
          <div class="mb-3">
            <label for="fim_reserva" class="form-label">Fim da Reserva</label>
            <input
              type="datetime-local"
              id="fim_reserva"
              name="fim_reserva"
              class="form-control @error('fim_reserva') is-invalid @enderror"
              value="{{ old('fim_reserva') }}"
              required
            />
            <div class="invalid-feedback"></div>
          </div>

          <!-- Botão de Envio -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Reservar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

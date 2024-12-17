<script setup></script>

<template>
  <div>
    <div class="container my-4">
      <h2 class="text-center">Reservas</h2>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Mesa</th>
              <th scope="col">Início da Reserva</th>
              <th scope="col">Final da Reserva</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mesa 5</td>
              <td>15/12/2024 12:00</td>
              <td>15/12/2024 14:00</td>
              <td>
                <button class="btn btn-warning btn-sm me-2">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Mesa 3</td>
              <td>15/12/2024 14:30</td>
              <td>15/12/2024 16:30</td>
              <td>
                <button class="btn btn-warning btn-sm me-2">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Mesa 1</td>
              <td>15/12/2024 17:00</td>
              <td>15/12/2024 19:00</td>
              <td>
                <button class="btn btn-warning btn-sm me-2">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

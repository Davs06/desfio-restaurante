@extends('layout.app')

@section('title', 'Reservas')

@section('content')

    <div class="container">

        <!-- Toast de Erros -->
        @if ($errors->any())
            <div class="toast-container position-fixed top-0 end-0 p-3">
                @foreach ($errors->all() as $error)
                    <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
                        aria-atomic="true" data-bs-autohide="false">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ $error }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Toast para Mesa Ocupada -->
        @if (session('mesa_ocupada'))
            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-autohide="false">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('mesa_ocupada') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Formulario -->
        <div class="card m-5">
            <div class="card-header">
                <h2> Mude sua Reserva</h2>
            </div>

            <div class="card-body p-5">
                <form action="{{ route('reserva.update', $reservas->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Seleção de Mesa -->
                    <div class="mb-3">
                        <label for="mesa_id" class="form-label">Selecione a Mesa</label>
                        <select id="mesa_id" name="mesa_id" class="form-control @error('mesa_id') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>Escolha uma mesa</option>
                            @foreach ($mesas as $mesa)
                                <option value="{{ $mesa->id }}"
                                    {{ old('mesa_id', $reservas->mesa_id) == $mesa->id ? 'selected' : '' }}>
                                    Mesa {{ $mesa->id }} - Quantidade de Lugares {{ $mesa->quantidade_de_lugares }}
                                </option>
                            @endforeach
                        </select>
                        @error('mesa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Início da Reserva -->
                    <div class="mb-3">
                        <label for="inicio_reserva" class="form-label">Início da Reserva</label>
                        <input type="datetime-local" id="inicio_reserva" name="inicio_reserva"
                            class="form-control @error('inicio_reserva') is-invalid @enderror"
                            value="{{ old('inicio_reserva', \Carbon\Carbon::parse($reservas->inicio_reserva)->format('Y-m-d\TH:i')) }}"
                            required>
                        @error('inicio_reserva')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Fim da Reserva -->
                    <div class="mb-3">
                        <label for="fim_reserva" class="form-label">Fim da Reserva</label>
                        <input type="datetime-local" id="fim_reserva" name="fim_reserva"
                            class="form-control @error('fim_reserva') is-invalid @enderror"
                            value="{{ old('fim_reserva', \Carbon\Carbon::parse($reservas->fim_reserva)->format('Y-m-d\TH:i')) }}"
                            required>
                        @error('fim_reserva')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Botão de Envio -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Mudar Reserva</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'))
            const toastList = toastElList.map(toastEl => new bootstrap.Toast(toastEl))
            toastList.forEach(toast => toast.show())
        });
    </script>

@endsection

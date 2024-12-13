@extends('layout.app')

@section('title', 'Reservas')

@section('content')

    <div class="container">
        <div class="card m-5">
            <div class="card-header">
                <h2> Escolha o dia e o horario da sua reserva </h2>
            </div>

            <div class="card-body p-5">
                <form action="{{ route('reserva.store') }}" method="POST">
                    @csrf

                    <!-- Seleção de Mesa -->
                    <div class="mb-3">
                        <label for="mesa_id" class="form-label">Selecione a Mesa</label>
                        <select
                            id="mesa_id"
                            name="mesa_id"
                            class="form-control @error('mesa_id') is-invalid @enderror"
                            required>
                            <option value="" disabled selected>Escolha uma mesa</option>
                            @foreach ($mesas as $mesa)
                                <option value="{{ $mesa->id }}" {{ old('mesa_id') == $mesa->id ? 'selected' : '' }}>
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
                        <input
                            type="datetime-local"
                            id="inicio_reserva"
                            name="inicio_reserva"
                            class="form-control @error('inicio_reserva') is-invalid @enderror"
                            value="{{ old('inicio_reserva') }}"
                            required
                        >
                        @error('inicio_reserva')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                        >
                        @error('fim_reserva')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Botão de Envio -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection

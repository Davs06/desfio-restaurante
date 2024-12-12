@extends('layout.app')

@section('title', 'Reservas')

@section('content')

    <div class="container">
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
                        <select
                            id="mesa_id"
                            name="mesa_id"
                            class="form-control @error('mesa_id') is-invalid @enderror"
                            required>
                            <option value="" </option>
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

                    <!-- Seleção de Horário de Início -->
                    <div class="mb-3">
                        <label for="inicio_reserva" class="form-label">Início da Reserva</label>
                        <select
                            id="inicio_reserva"
                            name="inicio_reserva"
                            class="form-control @error('inicio_reserva') is-invalid @enderror"
                            required
                        >
                            <option value="" disabled selected>Selecione o horário de início</option>
                            @php
                                $startHour = 18;
                                $endHour = 23;
                                $today = now()->format('Y-m-d');
                            @endphp
                            @for($hour = $startHour; $hour < $endHour; $hour++)
                                @foreach([0, 30] as $minute)
                                    <!-- Intervalos de 30 minutos -->
                                    @php
                                        $time = sprintf('%02d:%02d:00', $hour, $minute);
                                        $datetime = "$today $time";
                                    @endphp
                                    <option
                                        value="{{ $datetime }}" {{ old('inicio_reserva') == $datetime ? 'selected' : '' }}>
                                        {{ sprintf('%02d:%02d', $hour, $minute) }}
                                    </option>
                                @endforeach
                            @endfor
                        </select>
                        @error('inicio_reserva')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Seleção de Horário de Fim -->
                    <div class="mb-3">
                        <label for="fim_reserva" class="form-label">Fim da Reserva</label>
                        <select
                            id="fim_reserva"
                            name="fim_reserva"
                            class="form-control @error('fim_reserva') is-invalid @enderror"
                            required
                        >
                            <option value="" disabled selected>Selecione o horário de fim</option>
                        </select>
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
        document.addEventListener('DOMContentLoaded', function () {
            const inicioReserva = document.getElementById('inicio_reserva');
            const fimReserva = document.getElementById('fim_reserva');

            inicioReserva.addEventListener('change', function () {
                const selectedTime = this.value;
                const startTime = new Date(selectedTime + ' UTC');
                const intervalMinutes = 30;

                if (!startTime) return;

                fimReserva.innerHTML = '<option value="" disabled selected>Selecione o horário de fim</option>';
                const endTime = new Date(startTime);
                endTime.setHours(23, 59, 59);  // Limitar o horário de fim para o final do dia
                startTime.setMinutes(startTime.getMinutes() + 60);  // Adicionar 1 hora ao horário de início

                // Garantir que o horário final não ultrapasse as 23h
                if (startTime.getHours() >= 23) {
                    startTime.setHours(23, 0, 0);
                }

                // Gerar as opções de horário final
                while (startTime <= endTime) {
                    const dateValue = startTime.toISOString().split('T')[0] + ' ' +
                        startTime.toISOString().split('T')[1].substring(0, 5) + ':00';
                    const timeString = startTime.toISOString().split('T')[1].substring(0, 5);

                    // Impedir que o horário final ultrapasse 23h
                    if (startTime.getHours() > 23) {
                        break;
                    }

                    const option = document.createElement('option');
                    option.value = dateValue;
                    option.textContent = timeString;
                    fimReserva.appendChild(option);

                    // Incrementar o intervalo de 30 minutos
                    startTime.setMinutes(startTime.getMinutes() + intervalMinutes);
                }
            });
        });


    </script>

@endsection

@extends('layout.app')

@section('title', 'Minhas Reservas')

@section('content')
    <div class="container">

        <div class="card m-5 p-3">
            <div class="card-header">
                <h2>Minhas Reservas</h2>
            </div>

            <div class="card-body p-5">
                @if($reservas->isEmpty())
                    <p>Você ainda não possui reservas.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Mesa</th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reserva->mesa_id ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->inicio_reserva)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reserva->fim_reserva)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('reserva.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

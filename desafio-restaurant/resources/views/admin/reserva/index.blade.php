@extends('adminlte::page')

@section('title', 'Admin Reservas')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="simpleTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Mesa</th>
                    <th>Inicio da Reserva</th>
                    <th>Fim reserva</th>
                </tr>
                </thead>

                @foreach($reservas as $reserva)
                    <tbody>
                    <tr>
                        <td>{{$reserva->id}}</td>
                        <td>{{$reserva->name}} </td>
                        <td>{{$reserva->mesa_id}} </td>
                        <td>{{\Carbon\Carbon::parse($reserva->inicio_reserva)->format('d/m/Y H:i')}} </td>
                        <td>{{\Carbon\Carbon::parse($reserva->fim_reserva)->format('d/m/Y H:i')}} </td>

                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#simpleTable').DataTable({
                responsive: true,
                autoWidth: true,
                paging: true,
                searching: false,
                ordering: true
            });
        });
    </script>
@endsection

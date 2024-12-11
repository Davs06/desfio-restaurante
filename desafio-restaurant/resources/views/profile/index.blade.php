@extends('adminlte::page')

@section('title', 'Admin Usuarios')

@section('content_header')
    <h1>Usuarios Cadastrados</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-body">
                <table id="simpleTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                    </thead>

                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}} </td>
                            <td>{{$user->email}} </td>
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

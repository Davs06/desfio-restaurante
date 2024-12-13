@extends('adminlte::page')

@section('title', 'Lista Usuarios')

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
        <div class="card-footer ">
            {!! $users->links() !!}
        </div>

    </div>
@endsection


@section('js')
    <script>
        $(function () {
            $('#simpleTable').DataTable({
                responsive: true,
                autoWidth: true,
                paging: false,
                searching: false,
                ordering: true
            });
        });
    </script>
@endsection

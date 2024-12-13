@extends('adminlte::page')

@section('title', 'Admin Mesas')

@section('content_header')
    <h1>Mesas</h1>
@stop

@section('content')

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="simpleTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Quantidade de lugares da mesa</th>
                </tr>
                </thead>

                @foreach($mesas as $mesa)
                    <tbody>
                    <tr>
                        <td>{{$mesa->id}}</td>
                        <td>{{$mesa->quantidade_de_lugares}} lugares</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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

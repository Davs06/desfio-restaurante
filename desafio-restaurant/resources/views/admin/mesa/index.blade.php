@extends('adminlte::page')

@section('title', 'Teste')

@section('content_header')
    <h1>Mesas</h1>
@stop

@section('content')

    @foreach($mesas as $mesa)
        <p>quantidade de lugares: {{$mesa->quantidade_de_lugares}}</p>
    @endforeach
@stop

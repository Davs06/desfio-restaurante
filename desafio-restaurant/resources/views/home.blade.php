@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="container-xl d-flex flex-column justify-content-center">

        <h2 class="d-flex justify-content-center my-5">Bem Vindo ao Portal de reservas !!!</h2>

        <div class="d-flex justify-content-center my-5 gap-3">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('vendor/img/img1.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Fazer reserva</h5>
                    <p class="card-text">Veja os melhores horarios disponiveis para sua reserva. </p>
                    <a href="{{ route('reserva.create') }}" class="btn btn-primary">Reservar</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img src="{{asset('vendor/img/img2.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ver suas reservas</h5>
                    <p class="card-text">Veja, mude ou cancele suas reservas. </p>
                    <a href="{{ route('reserva.index') }}" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>


    </div>

@endsection

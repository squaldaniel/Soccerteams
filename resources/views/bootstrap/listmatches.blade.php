@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
<div class="container-fluid"><div class="container my-5">
    <div class="p-5 text-center bg-body-tertiary rounded-3">
    <h1 class="text-body-emphasis">Time de feras 🐯</h1>
    <p class="lead">
        Conheça um Dream-team de personagens que de vez em quando reunem-se para uma partida de futebol.
    </p>
    <a href='/soccermatches/create' class="btn btn-primary"> Marcar pardida </a>
    <h3 class="d-flex justify-content-right">Partidas Marcadas</h3>
    @foreach ($matches as $key => $match)
        <div class="d-flex justify-content-right">
            <p>
                Dia: {{ date('d/m/Y', strtotime($match['daymatches'])) }} -
                <a href='/confirmations/show/{{$match['id']}}'>Presenças confirmadas</a>
            </p>
        </div>
    @endforeach
    </div>
</div>
@endsection

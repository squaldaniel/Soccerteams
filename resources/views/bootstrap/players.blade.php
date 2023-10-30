@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
<div class="container-fluid">
    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
        <h1 class="text-body-emphasis">Time de feras 🐯</h1>
        <p class="lead">
            Conheça um Dream-team de personagens que de vez em quando reunem-se para uma partida de futebol.
        </p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
    @foreach ($players as $key => $player)
        <div class="card" style="width: 18rem; margin:5px">
            <img src="{{$player->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$player->soccerplayer}}</h5>
                <p class="card-text">
                    Nivel : {{$player->level}}
                </p>
                <p class="card-text">
                    Goleiro :
                        @if($player->goalkeeper == 1)
                            Sim
                            @else
                            Não
                        @endif
                </p>
            </div>
            <a href="/soccerplayer/edit/{{$player->id}}" class="btn btn-primary" style="margin-bottom: 20px">editar</a>
            </div>
    @endforeach
    </div>
</div>
@endsection

@extends('bootstrap.model')
@section('body')
<div class="container-fluid">
    <div class="container my-5">
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
            </div>
    @endforeach
    </div>
</div>
@endsection

@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
    <div class="container-fluid">
        <div class="p-2 text-center bg-body-tertiary">
            <div class="container py-2">
              <h1 class="text-body-emphasis">Times Sorteados</h1>
              <p class="col-lg-8 mx-auto lead">
                Caso não concorde, pode sortear novamente, recarregado a página ou clicando
                <a href="#" onclick="javascript: location.reload()">aqui</a>
              </p>
            </div>
          </div>
        @if(isset($teams))
            <div class="row">
                @php $numTeam = 1; @endphp
                @foreach ( $teams as $key => $time)
                <div class="container my-5">
                    <h1 class="text-body-emphasis">Time: {{$numTeam}}</h1>
                </div>
                        @foreach ($time as $k => $player)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem; margin:5px">
                                <img src="{{$player['photo']}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$player['soccerplayer']}}</h5>
                                    <p class="card-text">
                                        Nivel : {{$player['level']}}
                                    </p>
                                    <p class="card-text">
                                        Goleiro :
                                            @if($player['goalkeeper'] == 1)
                                                Sim
                                                @else
                                                Não
                                            @endif
                                    </p>
                                </div>
                                </div>
                        </div>
                        @endforeach
                        @php $numTeam++;@endphp
                @endforeach
            </div>
        @else
            {{print_r($message)}}
        @endif
    </div>
@endsection

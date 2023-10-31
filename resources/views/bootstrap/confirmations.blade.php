@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
@if (session('msg'))
    <div class="alert alert-danger" role="alert">
        {{ session('msg') }}
      </div>
@endif
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-6">
            <div class="dropdown-menu d-block position-static border-0 pt-0 mx-0 rounded-3 shadow overflow-hidden w-280x" data-bs-theme="dark">
                <ul class="list-unstyled mb-0">
                    <li>
                        <div style="margin-left: 20px">
                            <p>
                                <strong class="d-block">⚽ Pardida do Dia :
                                <small>{{date('d/m/Y', strtotime($confirmations['daymatches']))}}</small>
                                </strong>
                            </p>
                            <p><strong></strong></p>
                            <strong>Presenças confirmadas: <span class="badge text-bg-secondary">{{count($confirmations['confirmations'])}}</span></strong>
                        </div>
                    </li>
                    @foreach ($confirmations['confirmations'] as $key => $player)
                        <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                            <span class="d-inline-block bg-success rounded-circle p-1"></span>
                            {{$player['player']['soccerplayer']}}
                          </a>
                        </li>
                    @endforeach
                </ul>
                <form method="POST" action="/confirmations/startgame">
                    @csrf <input type="hidden" name="matche" value="{{$confirmations['id']}}">
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Realizar partida</h4>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Nº de jogadores: </label>
                            <div class="col-sm-8">
                                <select class="form-select" name="numplayers">
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                          </div>
                        <input type='submit' class="btn btn-success" value="Fechar partida e criar times">
                    </div>
                </form>
              </div>
        </div>
        <div class="col-md-6">
            <div class="dropdown-menu d-block position-static pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px bg-dark-subtle" >
                <form action="/confirmations/create" method="POST">
                    @csrf
                    <input type="hidden" name="matches" value='{{$confirmations['id']}}'>
                <ul class="list-unstyled mb-0">
                    @foreach ($players as $key=>$player)
                    <li>
                        <div class="form-check form-switch py-1" style="margin: 1rem">
                            <input class="form-check-input" type="checkbox" role="switch" name="playerpresence[]" value="{{$player['id']}}">
                            <label class="form-check-label" for="flexSwitchCheckDefault">
                                <a href="/soccerplayer/show/{{$player['id']}}" class="text-decoration-none text-danger">
                                    <strong>{{$player['soccerplayer']}}</strong>
                                </a>
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <input type="submit" class="btn btn-primary" value="confirmar presença">
              </div>
        </div>
    </div>
</div>
@endsection

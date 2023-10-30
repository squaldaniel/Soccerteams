@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
<div class="container-fluid">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Marque o dia da próxima partida</h1>
          <p class="col-lg-10 fs-4">Após marcar o dia da partida, é preciso que pessoas que possam participar confirmem, antes de pedir para o sistema sortear os times.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="/soccermatches/store" method="POST">
            @csrf
            <div class="form-floating mb-3">
              <input type="date" class="form-control" name="floatingdate" name="floatingdate" required>
              <label for="floatingdate">Dia da partida</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Definir partida</button>
            <hr class="my-4">
          </form>
        </div>
      </div>
</div>
@endsection

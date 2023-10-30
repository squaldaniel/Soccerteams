@extends('bootstrap.model')
@section('header')
    @include('bootstrap.topmenu')
@endsection
@section('body')
    <form action="/soccerplayer/update/{{$player->id}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="container-fluid">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="floatname"  value="{{$player->soccerplayer}}" placeholder="Player Name" required>
            <label for="floatname">Player name:</label>
        </div>
        <div class="row mb-3">
            <label for="levelinput" class="col-sm-2 col-form-label">Level:</label>
            <div class="col-sm-10">
              <select class="form-select" id="levelinput" name="levelinput" required>
                    <option value="{{$player->level}}">Nivel Atual: {{$player->level}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="goalkeeperinput" class="col-sm-2 col-form-label">Goleiro:</label>
            <div class="col-sm-10">
                @if($player->goalkeeper == 1)
                <input type="radio" name="goalkeeperinput" value="1" checked> SIM
                <input type="radio" name="goalkeeperinput" value="0" > Não
                @elseif ($player->goalkeeper == 0)
                <input type="radio" name="goalkeeperinput" value="1"> SIM
              <input type="radio" name="goalkeeperinput" value="0" checked> Não
                @endif
            </div>
          </div>
          <div class="row mb-3">
            <label for="goalkeeperinput" class="col-sm-2 col-form-label">Photo:</label>
            <div class="col-sm-3">
                <img id="frame" src="{{$player->photo}}" class="img-fluid" />
            </div>
            <div class="col-sm-5">
                <input class="form-control" type="file" id="inputphoto" name="inputphoto" onchange="preview()">
            </div>
          </div>
        <div class="col-mb-3">
        </div>
        <div class="row mb-2">
            <input type='submit' class="btn btn-primary" value="Atualizar">
        </div>
    </div>
    </form>
@endsection
@section('footerscripts')
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection
@section('headerscripts')
    <style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
    min-height: 100vh;
    background-color: #757f9a;
    background-image: linear-gradient(147deg, #757f9a 0%, #d7dde8 100%);
}
    </style>
@endsection

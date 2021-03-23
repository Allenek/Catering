@extends('layouts.app')

@section('content')
  <h1>Wybór cateringu</h1>
  <div class="row">

    @if(count($caterings) > 0)
      @foreach($caterings as $catering)
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              @if(!(($date->hour.":".$date->minute)>$catering->Godzina_realizacji))
              <h5 class="card-title"><a href="orders/{{$catering->menu->id}}">{{$catering->Nazwa}}</a></h5>
              @else
              <h5 class="card-title">{{$catering->Nazwa}}</h5>
              @endif
              <p class="card-text">Zamknięcie przyjmowania zamówień: {{$catering->Godzina_realizacji}}</p>
            </div>
          </div>
        </div>
      @endforeach
    @endif

  </div>
@endsection

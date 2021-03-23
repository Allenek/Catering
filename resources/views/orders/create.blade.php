@extends('layouts.app')

@section('content')
@if(count($orders) >0)
  <h1>Zamówienie</h1>
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Nazwa Potrawy</th>
            <th>Cena(PLN)</th>
            <th>Kaloryczność(KCAL)</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->Nazwa}}</td>
            <td>{{$order->Cena}}</td>
            <td>{{$order->Kalorycznosc}}</td>
            <td><button type="button" data-id="{{$order->id}}" class="btn removeFromCart btn-danger">Usuń</button></td>
        </tr>
        @endforeach
        <tr>
          <td></td>
        </tr>
        <tr>
          <th>Cena łączna:</th>
        <td>{{$sum_price}}</td>
        <td>
          <button type="button" data-id2="{{$sum_price}}" class="btn addOrder btn-secondary">Dodaj zamówienie</button>
          <button type="button" class="btn removeAll btn-danger">Wyczyść koszyk</button>
        </td>
        </tr>
    </tbody>
</table>
<script>
$(".removeFromCart").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: "/cart/delete/" + $(this).data("id"),
    success: function(response){
      alert("Danie zostało usunięte z koszyka");
      location.reload(true);
    }
  })
})

$(".removeAll").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: "/cart/flush/",
    success: function(response){
      alert("Koszyk został wyczyszczony");
      location.reload(true);
    }
  })
})

$(".addOrder").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: "/order/storeOrder/" + $(this).data("id2"),
    success: function(response){
      alert("Zamówienie zostało dodane");
      location.reload(true);
    }
  })
})
</script>

@else
  <h1><center>Brak zamówień</center></h1>
@endif
@endsection

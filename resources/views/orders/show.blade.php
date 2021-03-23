@extends('layouts.app')

@section('content')
<h1>Potrawy</h1>
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Kaloryczność</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
        <tr>
            <td>{{$dish->Nazwa}}</td>
            <td>{{$dish->Cena}}PLN</td>
            <td>{{$dish->Kalorycznosc}}KCAL</td>
            <td><a data-id="{{$dish->id}}" href="" class="btn btn-info">Zamów</a></td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
$(".btn").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: "/cart/add/" + $(this).data("id"),
    success: function(response){
      alert("Danie zostało dodane do koszyka");
    }
  })
})

</script>
@endsection

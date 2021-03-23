@extends('layouts.app')

@section('content')
<h1>Potrawy w menu</h1>
<div class="">
  <a href="dishes/create" class="btn btn-primary add-btn">+ Dodaj</a>
</div>
@if(count($dishes) >0)
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Nazwa</th>
            <th>Cena(PLN)</th>
            <th>Kaloryczność(KCAL)</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($dishes as $dish)
        <tr>
            <td>{{$dish->Nazwa}}</td>
            <td>{{$dish->Cena}}</td>
            <td>{{$dish->Kalorycznosc}}</td>
            <td><a href="dishes/{{$dish->id}}/edit" class="btn btn-info">Edytuj</a></td>
            <td>{!! Form::open(['action' => ['DishController@destroy', $dish->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::bsSubmit('Usuń', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<script>
$(document).ready( function () {
    $('#table_id').DataTable(
      {
        language: { url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Polish.json' }
      }
    );
} );
</script>
@endsection

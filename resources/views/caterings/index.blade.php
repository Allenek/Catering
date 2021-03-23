@extends('layouts.app')

@section('content')
<h1>Cateringi</h1>
<div class="">
  <a href="catering/create" class="btn btn-primary add-btn">+ Dodaj</a>
</div>
@if(count($caterings) >0)
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Nazwa</th>
            <th>Godzina Realizacji</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($caterings as $catering)
        <tr>
            <td>{{$catering->Nazwa}}</td>
            <td>{{$catering->Godzina_realizacji}}</td>
            <td><a href="catering/{{$catering->id}}/edit" class="btn btn-info">Edytuj</a></td>
            <td>{!! Form::open(['action' => ['CateringController@destroy', $catering->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
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

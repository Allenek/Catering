@extends('layouts.app')

@section('content')
<h1>Pracownicy</h1>
<div class="">
  <a href="employees/create" class="btn btn-primary add-btn">+ Dodaj</a>
  <button type="button" class="btn refreshFunds btn-warning">Odśwież dofinansowanie</button>
</div>
</br>
@if(count($employees) >0)
  <container>
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Imię</th>
            <th>Naziwsko</th>
            <th>Pesel</th>
            <th>Email</th>
            <th>Stanowisko</th>
            <th>Kwota dofinansowania</th>
            <th>Pozostała kwota</th>
            <th>Uprawnienia</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->Imie}}</td>
            <td>{{$employee->Nazwisko}}</td>
            <td>{{$employee->Pesel}}</td>
            <td>{{$employee->Email}}</td>
            <td>{{$employee->Stanowisko}}</td>
            <td>{{$employee->Kwota_dofinansowania}}PLN</td>
            <td>{{$employee->Pozostała_kwota}}PLN</td>
            <td>{{$employee->Uprawnienia}}</td>
            <td><a href="employees/{{$employee->id}}/edit" class="btn btn-info">Edytuj</a></td>
            <td>{!! Form::open(['action' => ['EmployeeController@destroy', $employee->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
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

$(".refreshFunds").on("click", function(e){
  e.preventDefault();
  $.ajax({
    url: "/employees/refreshFunds/",
    success: function(response){
      alert("Dofinansowania zostały odświeżone");

    }
  })
});

</script>
@endsection

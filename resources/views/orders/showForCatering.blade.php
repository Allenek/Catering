@extends('layouts.app')

@section('content')
<h1>Zamówienia dzienne</h1>
@if(count($orders) >0)
<table class="table table-striped" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th>Data zamówienia</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Pesel</th>
            <th>Nazwa potrawy</th>
            <th>Cena potrawy(PLN)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->orders->Data_zamowienia}}</td>
            <td>{{$order->orders->employee->Imie}}</td>
            <td>{{$order->orders->employee->Nazwisko}}</td>
            <td>{{$order->orders->employee->Pesel}}</td>
            <td>{{$order->dishes->Nazwa}}</td>
            <td>{{$order->dishes->Cena}}</td>
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

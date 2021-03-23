@extends('layouts.app')

@section('content')
<a class="btn btn-secondary" href="/employees">Powrót</a>
<h1>Edytuj pracownika</h1>
{!! Form::open(['action' => ['EmployeeController@update', $employee->id], 'method' => 'POST']) !!}
{{ Form::bsText('Imię', $employee->Imie)}}
{{ Form::bsText('Nazwisko', $employee->Nazwisko) }}
{{ Form::bsText('Pesel', $employee->Pesel) }}
{{ Form::bsText('Email', $employee->Email) }}
{{ Form::bsText('Haslo', $employee->password) }}
{{ Form::bsText('Stanowisko', $employee->Stanowisko) }}
{{ Form::bsText('Kwota_dofinansowania', $employee->Kwota_dofinansowania) }}
{{ Form::bsText('Uprawnienia', $employee->Uprawnienia) }}
{{ Form::label('Catering :')}}
{{ Form::select('Catering', $catering, null,['placeholder' => 'Wybierz jeżeli jest to pracownik cateringu',
'class' => 'form-control']) }}
{{ Form::hidden('_method', 'PUT') }}
{{ Form::bsSubmit('Wyślij', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

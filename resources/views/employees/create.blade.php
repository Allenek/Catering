@extends('layouts.app')
@section('content')
  <a class="btn btn-secondary" href="/employees">Powrót</a>
<h1>Dodaj pracownika lub dofinansowanie</h1>
<container>
{!! Form::open(['action' => 'EmployeeController@store', 'method' => 'POST']) !!}
{{ Form::bsText('Imię')}}
{{ Form::bsText('Nazwisko') }}
{{ Form::bsText('Pesel') }}
{{ Form::bsText('Email') }}
{{ Form::bsText('Haslo') }}
{{ Form::bsText('Stanowisko') }}
{{ Form::bsText('Kwota_dofinansowania') }}
{{ Form::bsText('Uprawnienia') }}
{{ Form::label('Catering :')}}
{{ Form::select('Catering', $catering, null,['placeholder' => 'Wybierz jeżeli jest to pracownik cateringu',
    'class' => 'form-control']) }}
<br>
{{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
</container>

@endsection

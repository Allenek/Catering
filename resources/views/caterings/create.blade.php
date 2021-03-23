@extends('layouts.app')

@section('content')
<a class="btn btn-secondary" href="/catering">Powrót</a>
<h1>Dodaj Catering</h1>
{!! Form::open(['action' => 'CateringController@store', 'method' => 'POST']) !!}
{{ Form::bsText('Nazwa')}}
{{ Form::bsText('Godzina_realizacji') }}
{{ Form::bsSubmit('Wyślij', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

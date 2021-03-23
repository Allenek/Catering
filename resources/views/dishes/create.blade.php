@extends('layouts.app')

@section('content')
<a class="btn btn-secondary" href="/">Powrót</a>
<h1>Dodaj Potrawe do menu</h1>
{!! Form::open(['action' => 'DishController@store', 'method' => 'POST']) !!}
{{ Form::bsText('Nazwa')}}
{{ Form::bsText('Cena(PLN)') }}
{{ Form::bsText('Kaloryczność(KCAL)') }}
{{ Form::bsSubmit('Wyślij', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

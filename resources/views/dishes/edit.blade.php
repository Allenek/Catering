@extends('layouts.app')

@section('content')
<a class="btn btn-secondary" href="/">Powrót</a>
<h1>Edytuj potrawę w menu</h1>
{!! Form::open(['action' => ['DishController@update', $dish->id], 'method' => 'POST']) !!}
{{ Form::bsText('Nazwa', $dish->Nazwa) }}
{{ Form::bsText('Cena(PLN)', $dish->Cena) }}
{{ Form::bsText('Kaloryczność(KCAL)', $dish->Kalorycznosc) }}
{{ Form::hidden('_method', 'PUT') }}
{{ Form::bsSubmit('Wyślij', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

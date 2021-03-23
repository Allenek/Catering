@extends('layouts.app')

@section('content')
<a class="btn btn-secondary" href="/catering">Powrót</a>
<h1>Edytuj catering</h1>
{!! Form::open(['action' => ['CateringController@update', $catering->id], 'method' => 'POST']) !!}
{{ Form::bsText('Nazwa', $catering->Nazwa) }}
{{ Form::bsText('Godzina_realizacji', $catering->Godzina_realizacji) }}
{{ Form::hidden('_method', 'PUT') }}
{{ Form::bsSubmit('Wyślij', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

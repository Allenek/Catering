@extends('layouts.app')

@section('content')
<a class="btn btn-primary" href="/">Powrót</a>
<h1>{{$catering->Nazwa}}</h1>
<div class="label">
    {{$catering->Godzina_realizacji}}
</div>
<br><br>
<a href="/catering/{{$catering->id}}/edit" class="btn btn-primary">Edit</a>
{!! Form::open(['action' => ['CateringController@destroy', $catering->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}
@endsection

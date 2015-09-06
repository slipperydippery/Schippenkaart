@extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.show', 'header_route_id' => $ship->id, 'header_name' => $ship->name, 'header_option' => 'strippen' ])

@section('content')

        {!! Form::model($ship, ['method' => 'PATCH', 'route' => ['ships.update', $ship->id]]) !!}
            @include('ships.partials.form', ['submitButtonText' => 'Update Ship', 'create' => false])
        {!! Form::close() !!}

        @include('errors.list
        ')
@stop
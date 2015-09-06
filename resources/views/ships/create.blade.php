@extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.index', 'header_name' => 'Nieuw Schip' ])

@section('content')

    {!! Form::open(['route' => 'ships.store']) !!}
        @include('ships.partials.form', ['submitButtonText' => 'Create Ship', 'create' => true])
    {!! Form::close() !!}

    @include('errors.list')

@stop
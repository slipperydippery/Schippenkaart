@extends('layouts.master', ['home_option' => 'bridges', 'header_route' => 'ships.index', 'header_name' => 'Schepen Edam'])

@section('content')

@include('ships.partials.ship_index', ['shiplist' => $favships])

@include('ships.partials.ship_index', ['shiplist' => $ships])


<div id="addShip">
    <a href="{{ route('ships.create') }}"><img src="{{ url('img/add_icon.svg') }}"/> </a>
</div>

@stop
@extends('layouts.master', ['home_option' => 'bridges', 'header_route' => 'ships.index', 'header_name' => 'Schepen Edam'])

@section('content')

<ul class="list list--ships">
    @foreach ($ships as $ship)
        <li class="list__el list__el--ship">
            <a href = "{{ route('ships.show', $ship->id) }}">
                <span class="list__el__el list__el__span--strippen">{{ $ship->strippen_total }}</span>
                <span class="list__el__el list__el__span--name">{{ $ship->name }}</span>

            </a>
        </li>
    @endforeach
</ul>

<div id="addShip">
    <a href="{{ route('ships.create') }}"><img src="{{ url('img/add_icon.svg') }}"/> </a>
</div>

@stop
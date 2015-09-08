@extends('layouts.master', ['home_option' => 'bridges', 'header_route' => 'ships.index', 'header_name' => 'Schepen Edam'])

@section('content')

<table class="ship_index">
    @foreach ($ships as $ship)
        <tr class="ship_index__row">
            <td>
                <a href = "{{ route('ships.show', $ship->id) }}">
                    <span class="list__el__el list__el__span--strippen">{{ $ship->strippen_total }}</span>
                    <span class="list__el__el">{{ $ship->name }}</span>

                </a>
            </td>
        </tr>
    @endforeach
</table>

<div id="addShip">
    <a href="{{ route('ships.create') }}"><img src="{{ url('img/add_icon.svg') }}"/> </a>
</div>

@stop
@extends('layouts.master', ['header_route' => 'bridges.index', 'header_name' => 'Bruggen'])

@section('content')

<ul class="list list--ships">
    @foreach ($bridges as $bridge)
        <li class="list__el list__el--ship">
            <a href = "{{ route('openings.showtype', ['bridge', $bridge->id]) }}">
                <span class="list__el__el list__el__span--strippen">{{ $bridge->openings_total }}</span>
                <span class="list__el__el list__el__span--name">{{ $bridge->name }}</span>

            </a>
        </li>
    @endforeach
</ul>

<div id="addShip">
    <a href="{{ route('ships.create') }}" class="icono-plusCircle"></a>
</div>

@stop
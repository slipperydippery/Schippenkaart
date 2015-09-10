@extends('layouts.master', ['header_route' => 'bridges.index', 'header_name' => 'Brugwachters'])

@section('content')

<ul class="list list--ships">
    @foreach ($users as $user)
        <li class="list__el list__el--ship">
            <a href = "{{ route('openings.showtype', ['user', $user->id]) }}">
                <span class="list__el__el list__el__span--name">{{ $user->name }}</span>

            </a>
        </li>
    @endforeach
</ul>

<div id="addShip">
    <a href="{{ route('ships.create') }}" class="icono-plusCircle"></a>
</div>

@stop
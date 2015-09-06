@extends('layouts.master', ['home_option' => 'bridges', 'header_route' => 'bridges.index', 'header_name' => $bridge->name ])

@section('content')

<ul class="list list--ships">
    @foreach ($openings as $opening)
        <li class="list__el">
            <span class="list__el__el list__el__span--name">{{ $opening->ship_name }}</span>
            <span class="list__el__el list__el__span--user">{{ $opening->user_name }}</span>
            @if($user->id == $opening->user_id)
                <a href=" {{ URL::route('bridges.delete', $opening->id) }}">
                    <img class="list__el__el list__el__img list__el__img--undo" src="{{ url('img/remove.svg') }}"/>
                </a>
            @else
                    <img class="list__el__el list__el__img list__el__img--undo" src="{{ url('img/blank.svg') }}"/>
            @endif
            <span class="list__el__el list__el__span--time">{{ $opening->created_at->format("H:m -- d.m.y") }}</span>
        </li>
    @endforeach
</ul>


@stop
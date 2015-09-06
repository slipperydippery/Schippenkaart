@extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.edit', 'header_route_id' => $ship->id, 'header_name' => $ship->name, 'header_option' => 'strippen' ])

@section('content')

    <a href="{{ URL::route('ships.edit', $ship->id) }}">
        <div id="ship_info">
            <p>{{ $ship->owner_first . ' ' . $ship->owner_last }}</p>
             <p><span>{{ $ship->owner_email }}</span></p>
        </div>
    </a>

    <ul id="ship_last_opening">
        <a href = "{{ route('openings.showtype', ['ship', $ship->id]) }}">
            <li class="list__el">
                @if(!$ship->openings->isEmpty())
                    <span class="list__el__span--name">{{ $ship->openings->last()->bridge_name }} </span>
                    <span class="list__el__span--user">{{ $ship->openings->last()->user_name  }}</span>
                    <span class="list__el__span--time">{{ $ship->openings->last()->created_at->diffForHumans() }} </span>
                @else
                    <span>Nog geen gegevens</span>
                @endif
            </li>
        </a>

    </ul>


    {!! Form::open(['route' => 'openings.store', 'id' =>  'ship_opening_list']) !!}

        {!! Form::hidden('ship_id', $ship->id) !!}

        <!-- Provinciale Brug Form Input -->
        <div class="form-group form-group--vlist clearfix">
            {!! Form::checkbox('1', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '1']) !!}
            {!! Form::label('1', 'Provinciale Brug', ['class' => 'form-label']) !!}
        </div>

        <!-- Trambrug Form Input -->
        <div class="form-group form-group--vlist clearfix">
            {!! Form::checkbox('2', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '2']) !!}
            {!! Form::label('2', 'Trambrug', ['class' => 'form-label']) !!}
        </div>

        <!-- Kwakelbrug Form Input -->
        <div class="form-group form-group--vlist">
            {!! Form::checkbox('3', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '3']) !!}
            {!! Form::label('3', 'Kwakelbrug', ['class' => 'form-label']) !!}
        </div>

        <!-- Constabel Brug Form Input -->
        <div class="form-group form-group--vlist">
            {!! Form::checkbox('4', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '4']) !!}
            {!! Form::label('4', 'Constabel Brug', ['class' => 'form-label']) !!}
        </div>

        <!-- Baanbrug Form Input -->
        <div class="form-group form-group--vlist">
            {!! Form::checkbox('5', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '5']) !!}
            {!! Form::label('5', 'Baanbrug', ['class' => 'form-label']) !!}
        </div>

        <!-- Kettingbrug Form Input -->
        <div class="form-group form-group--vlist">
            {!! Form::checkbox('6', 'open', null, ['class' => 'form-control cb_hidden', 'id' => '6']) !!}
            {!! Form::label('6', 'Kettingbrug', ['class' => 'form-label']) !!}
        </div>

        <!-- Open Bridges Submit Field -->
        <div class="form-group">
            {!! Form::submit('Open Bridges', ['class' => 'btn form-control']) !!}
        </div>


    {!! Form::close() !!}


@stop
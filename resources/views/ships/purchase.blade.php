@extends('layouts.master', ['home_option' => 'ships', 'header_route' => 'ships.show', 'header_route_id' => $ship->id, 'header_name' => 'Koop Strippen', 'header_option' => 'strippen' ])

@section('content')


{!! Form::open(['method' => 'PATCH', 'route' => ['ships.purchased', $ship->id]]) !!}
    {!! Form::hidden('ship_id', $ship->id) !!}

    <!-- Purchase Form Input -->
        <div class="form-group form-group--radio form-group--radio--boxes">
            {!! Form::radio('purchase', '10', null, ['id' => '10']) !!}
            {!! Form::label('10', '10') !!}

            {!! Form::radio('purchase', '20', null, ['id' => '20']) !!}
            {!! Form::label('20', '20') !!}

            {!! Form::radio('purchase', '50', null, ['id' => '50']) !!}
            {!! Form::label('50', '50') !!}

            {!! Form::radio('purchase', '100', null, ['id' => '100']) !!}
            {!! Form::label('100', '100') !!}
        </div>

    <!-- Purchase Strippen Submit Field -->
    <div class="form-group">
        {!! Form::submit('Purchase Strippen', ['class' => 'btn form-control']) !!}
    </div>
{!! Form::close() !!}

@stop
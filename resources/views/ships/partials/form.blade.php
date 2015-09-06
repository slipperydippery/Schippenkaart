<!-- Name Form Input -->
<div class="form-group">
    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
</div>

<!-- Owner First Name Form Input -->
<div class="form-group">
    {!! Form::text('owner_first', null, ['placeholder' => 'Owner First Name', 'class' => 'form-control']) !!}
</div>

<!-- Owner last Name Form Input -->
<div class="form-group">
    {!! Form::text('owner_last', null, ['placeholder' => 'Owner Last Name', 'class' => 'form-control']) !!}
</div>

<!-- Owner Email Form Input -->
<div class="form-group">
	{!! Form::email('owner_email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
</div>

@if($create)
    <!--  Form Input -->
    <div class="form-group form-group--radio form-group--radio--boxes">
        {!! Form::radio('strippen_total', '0', true, ['id' => '0']) !!}
        {!! Form::label('0', '0') !!}

        {!! Form::radio('strippen_total', '10', null, ['id' => '10']) !!}
        {!! Form::label('10', '10') !!}

        {!! Form::radio('strippen_total', '20', null, ['id' => '20']) !!}
        {!! Form::label('20', '20') !!}

        {!! Form::radio('strippen_total', '50', null, ['id' => '50']) !!}
        {!! Form::label('50', '50') !!}

        {!! Form::radio('strippen_total', '100', null, ['id' => '100']) !!}
        {!! Form::label('100', '100') !!}
    </div>
@endif

<!-- Add Ship Submit Field -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn form-control']) !!}
</div>

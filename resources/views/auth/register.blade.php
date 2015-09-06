@extends('layouts.auth', ['header' => 'Register'])

@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Naam">
        </div>

        <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>

        <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
        </div>

        <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
        </div>

        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register">

        </div>
    </form>

    @include('errors.list')

@endsection
@extends('layouts.auth', ['header' => 'Login'])

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email">
        </div>

        <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
        </div>

        <div class="form-group form_options_group">
            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" id="remember">
            <br/>
            <a class="btn btn-link" href="{{ url('/password/email') }}"><p>Forgot Your Password?</p> </a>
        </div>

        <input type="submit" class="btn btn-primary" value="Login">

    </form>

    @include('errors.list')

@endsection
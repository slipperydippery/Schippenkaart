@extends('layouts.auth', ['header' => 'Reset Password'])

@section('content')
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <Input type="submit" class="btn btn-primary" value="Reset Password">
                </div>
            </div>
        </form>
@endsection
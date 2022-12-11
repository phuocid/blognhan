@extends('frontlayout')
@section('title','Verify')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            @if ( Session::has('message') )
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session()->get( "message" ) }}</strong>
                </div>
            @endif
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                <div class="card-body">
                    <form class="d-inline" method="POST" action="{{ route( 'email.confirm' ) }}">
                        @csrf
                        <input type="text" class="form-control" name="token">
                        <input type="hidden" class="form-control" value="{{ old( "email", request()->email ) }}" name="email">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

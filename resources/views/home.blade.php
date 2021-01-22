@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if (Auth::user()->hasrole('Super Admin'))
                        <h2>You are the Super Admin.</h2>
                    @elseif (Auth::user()->hasrole('News Editor'))
                        <h2>Welcome News Editor</h2>
                    @elseif (Auth::user()->hasrole('Event Editor'))
                        <h2>Welcome Event Editor</h2>
                    @elseif (Auth::user()->hasrole('Offer Editor'))
                        <h2>Welcome Offer Editor</h2>
                    @elseif (Auth::user()->hasrole('Business Editor'))
                        <h2>Welcome Business Editor</h2>
                    @else
                        <h2>You don't have any role</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-login mx-auto">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="text-center mb-6">
                <img src="./assets/brand/tabler.svg" class="h-6" alt="">
            </div>
            <form class="card" action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="card-body p-6">
                    <div class="card-title">Forgot password</div>
                    <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block">Send me new password</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted">
                Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
            </div>
        </div>
    </div>
    
</div>
@endsection

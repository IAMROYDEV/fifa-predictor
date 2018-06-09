@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                @include('user.predictions.favourite-team')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-ball')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-boot')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-glove')
            </div>
            <div class="col-md-12">
                @include('user.predictions.worldcup-winner')
            </div>
        </div>
    </div>
</div>
@endsection

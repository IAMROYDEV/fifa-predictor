@extends('layouts.app')

@section('content')
<div class="container dashboard">
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    @include('user.predictions.current-match', ['currentMatch' => $currentMatch, 'currentMatchPrediction' => $currentMatchPrediction])
                </div>
                <div class="col-md-12">
                    @include('user.predictions.squad')
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

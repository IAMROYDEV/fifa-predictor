@extends('main')

@section('content')
<div class="text-center heading">
    <h2>BUILD YOUR TOP SCORING SQUAD & PREDICT MATCH SCORES TO WIN</h4>
        <h4>
            @auth
                Welcome
            @else
                NOT A MEMBER AS YET?
            @endauth
        </h5>
        <br><br>
        @auth
        <div>
            <a href="/dashboard"><img src="{{Auth::user()->avatar}}" class="img-circle"/></a></div>
            <a href="/dashboard" style="text-decoration: none; color: #fff; cursor: pointer;">
            <span class="ml-2 d-none d-lg-block">
                <h3 class="text-default">{{ Auth::user()->name }}</h3>
            </span>
            </a>
        @else
            <a href="/redirect" class="root-btn green-btn big-btn">LOGIN WITH FACEBOOK</a>
        @endauth

</div>
@endsection
@section('metadata')
<title>fifa8teen</title>
<meta property="og:image" content="{{asset('img/Fantasy-football-edge-logo-transparent.png')}}"/>
@endsection
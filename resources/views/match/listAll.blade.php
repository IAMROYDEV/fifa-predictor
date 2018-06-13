@extends('main')

@section('content')
<div class="container">
    <div class="card" style="opacity: 0.8">
        <div class="card-header">
            <h3 class="card-title text-left col-md-8">Matches</h3>
            <div class="col-md-4">
                <form class="" id="filter-match" action="/matches" method="get">
                <select name="team_id" id="team_id" class="form-control" required>
                   <option value="">Select Team</option>
                    @if($teams)
                        @foreach($teams as $team)
                            <option value="{{$team->id}}" 
                                {{ ($slectedTeamid == $team->id ? "selected":"") }}
                                data-data='{"image":"/assets/images/flags/{{$team->code}}.svg"}' >
                                {{str_replace('_',' ',$team->name)}}
                            </option>
                        @endforeach
                    @endif
               </select>
                </form>
            </div>
        </div>
        <div class="card-body" style="padding-top: 20px">
            @if($matches)
            <div class="row">
                @foreach($matches as $match)
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
                    <div class="text-muted mb-4" style="margin-bottom: 10px; color: #080808cf; font-weight: bold">
                        {{$match->matchStage->title}}
                        @if($match->played_date):
                        {{$match->played_date->addMinutes($_COOKIE['timezone'])->format('D, d/m h:i A')}}
                        @endif
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div>{{$match->teamA->name}}</div>
                        <img src="/assets/images/flags/{{$match->teamA->code}}.svg" alt="" height="40" class="border border-light rounded">
                        <br/>
                        <div class="circle" style="margin-top: 10px">{{$match->team1_score !== null ? $match->team1_score : "-"}}</div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <br>
                        <b style="font-size: 20px">vs</b>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div>{{$match->teamB->name}}</div>
                        <img src="/assets/images/flags/{{$match->teamB->code}}.svg" alt="" height="40" class="border border-light rounded">
                        <br/>
                        <div class="circle" style="margin-top: 10px">{{$match->team2_score !== null ? $match->team2_score : "-"}}</div>
                    </div> 
                </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
</div>
<script>
$( "#team_id" ).change(function() {
    $("#filter-match").submit();
});
</script>
@endsection
@section('metadata')
<title>Match - fifa8teen</title>
<meta property="og:image" content="{{asset('img/Fantasy-football-edge-logo-transparent.png')}}"/>
@endsection


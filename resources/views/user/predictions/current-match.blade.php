<div class="card">
    <div class="card-header">
        @if($currentMatch)
            Upcoming match predictions
        @else
            Match Predictions
        @endif
        @include('leaderboard.current-rank',['type'=>'predictions'])
        <i class="fe fe-help-circle button-right" data-toggle="tooltip" data-placement="top" title="Predict daily match scores and add points to your tally. Match score predictor is locked 1 hour before the match starts.!!"></i>
    </div>
    <div class="card-body text-center">
        @if($currentMatch)
            @if(auth()->user()->match_prediction_score)
                <p class="text-center">
                    <b>Your prediction score {{auth()->user()->match_prediction_score}} ⭐ </b>
                </p>
            @endif
        <div class="text-muted mb-4">
            {{$currentMatch->matchStage->title}}
            @if($currentMatch->played_date):
            {{date('D, d/m h:i A', strtotime($currentMatch->played_date))}}
            @endif
            @if($currentMatch->locked)
            <i class="fe fe-lock"></i>
            @endif
        </div>
        <div class="row">
            <div class="col-5">
                <div>{{$currentMatch->teamA->name}}</div>
                <img src="/assets/images/flags/{{$currentMatch->teamA->code}}.svg" alt="" height="40px" class="border border-light rounded">
                <br/>
                @if($currentMatchPrediction)
                <h2 style="margin-top: 10px">{{$currentMatchPrediction->team1_score}}</h2>
                @endif
            </div>
            <div class="col-2">
                <br><br><br>
                <b style="font-size: 20px">vs</b>
            </div>
            <div class="col-5">
                <div>{{$currentMatch->teamB->name}}</div>
                <img src="/assets/images/flags/{{$currentMatch->teamB->code}}.svg" alt="" height="40" class="border border-light rounded">
                <br/>
                @if($currentMatchPrediction)
                <h2 style="margin-top: 10px">{{$currentMatchPrediction->team2_score}}</h2>
                @endif
            </div>

        </div>
        <a href="{{route('matchPredictions',1)}}" class="btn btn-pill btn-secondary" style="margin-top: 15px;">
            <i class="fe fe-users"></i>
            Predict match scores!
        </a>
        @endif
    </div>
</div>
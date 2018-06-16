<div class="clearfix"></div>
<h2>Top Match Predictors</h2>
<legend>This lists includes players with most successfull match predictions</legend>
@include('leaderboard.auth-message')
@if(auth()->user() )
<div class="alert alert-warning" role="alert" style="font-size: 16px">
    @if($selfRank && !count($selfRank->where('type','predictions')))
        It seems you still have not selected or locked your squad 
    @endif
    <a href="/match/prediction/1" class="btn btn-warning">Click here to update your score predictions</a>
</div>
@endif
<table class="table table-hover table-outline table-vcenter text-nowrap card-table" style="text-align:left">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        @foreach($predictions as $squad)
            <tr
            @if(auth()->user() && $squad->user_id==auth()->user()->id)
             class="self-rank"
            @endif
            >
                <td>
                    {{$squad->rank}}
                    @if($squad->up_down)
                        <i class="fa fa-chevron-{{$squad->up_down}}"></i>
                        
                    @endif
                </td>
                <td>
                    <img src="{{$squad->user->avatar}}" class="img-circle" alt="" style="height:40px">
                    @if($squad->up_down && $squad->rank_diff)
                        <span class="label label-{{$squad->rank_diff > 0 ?'success' : 'danger'}}">
                            {{$squad->rank_diff>0?'+':''}}{{$squad->rank_diff}}
                        </span>
                    @endif
                    {{$squad->user->name}}
                </td>
                <td>
                    {{$squad->points}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
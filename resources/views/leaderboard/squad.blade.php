<div class="clearfix"></div>
<h2>Top Goal Scorer Squads</h2>
<legend>This lists includes players with most successfull squads of goal scorers</legend>
@include('leaderboard.auth-message')
@if(auth()->user() && $selfRank && !count($selfRank->where('type','squad')))
    <div class="alert alert-warning" role="alert" style="font-size: 16px">
     It seems you still have not selected or locked your squad <a href="/users-squad" class="btn btn-warning">Click here to create your squad</a>
    </div>
@endif
<table class="table" style="text-align:left">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        @foreach($squads as $squad)
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
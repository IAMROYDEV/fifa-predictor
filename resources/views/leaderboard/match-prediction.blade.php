<div class="clearfix"></div>
<h2>Top {{$rankLimit}} Match Predictors</h2>
<legend>This lists includes players with most successfull match predictions</legend>
@include('leaderboard.auth-message')
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
            <tr>
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
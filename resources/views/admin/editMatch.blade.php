@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        {{-- {{dd($goalsScored)}} --}}
        <div class="card-header">
            <h3 class="card-title">Edit Match</h3>
        </div>
        <form class="" action="{{ route('updatematch', $match->id) }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Select Tournament</label>
                            <select name="world_cup_id" class="form-control custom-select">
                                @foreach($tournaments as $tournament)
                                <option value="{{$tournament->id}}" {{ ($tournament->id == $match->world_cup_id ? "selected":"") }}>
                                    {{$tournament->place}} {{$tournament->year}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Match Date</label>
                            <input type="text" name="played_date" class="form-control" data-mask="YYYY-MM-DD HH:MM:SS" data-mask-clearifnotmatch="true" placeholder="YYYY-MM-DD HH:MM:SS (In UTC)" autocomplete="off" maxlength="19" value="{{$match->played_date}}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team1</label>
                            <select name="team1" class="form-control custom-select">
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" {{ ($team->id == $match->team1 ? "selected":"") }}>
                                    {{str_replace('_',' ',$team->name)}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team2</label>
                            <select name="team2" class="form-control custom-select">
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" {{ ($team->id == $match->team2 ? "selected":"") }}>
                                    {{str_replace('_',' ',$team->name)}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team1 Score</label>
                            <input type="text" name="team1_score" class="form-control" value="{{$match->team1_score}}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team2 Score</label>
                            <input type="text" name="team2_score" class="form-control" value="{{$match->team2_score}}">
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-8 col-md-8">
                        <div class="form-group">
                            <label class="form-label">Scorer</label>
                            <select id="player_id" class="player-select form-control">
                                <option value="">Select Player</option>
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">
                                        {{$player->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <div class="form-group">
                            <label class="form-label">Goals Scored</label>
                            <input type="number" id="goalsScored" class="form-control" value="{{$match->team2_score}}">
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <div class="form-group">
                            <label class="form-label">&nbsp;</label>
                            <input type="button" id="addGoals" class="btn btn-primary btn-block" value="Add">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto">Update match</button>
                </div>
            </div>
        </form>
    </div>
    @if($totGoalsScored!==$goalsRecorded)
        <div class="alert alert-icon alert-danger" role="alert">
            <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
            Goals Scorer and Match Scores Doesn't tally
        </div>
    @else
        <div class="alert alert-icon alert-success" role="alert">
         <i class="fe fe-check mr-2" aria-hidden="true"></i> Goals Scorer and Match Scores tally
        </div>
    @endif
    <div class="card">
        <div class="card-header">Goals Scorer</div>
        <div class="card-body">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Player</th>
                        <th>Goals Scored</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($goalsScored as $goals)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$goals->player->name}}</td>
                        <td>{{$goals->goals}}</td>
                        <td>
                        <a href="/admin/remove-goals?playerID={{$goals->player_id}}&&matchID={{$goals->match_id}}">
                            <i class="fe fe-delete"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
@section('sub-scripts')
<script>
    window.onload=function(){
       require(['jquery'],function($){
           $(function(){
               $('#addGoals').click(()=>{
                   let player=$('#player_id').val();
                   let goals=$('#goalsScored').val();
                   if(!player || !goals){
                       alert('player or goals missing');
                       return;
                   }
                   $.post({
                       url : '/admin/save-goals/',
                       data : {
                           matchID : {{$match->id}},
                           playerID: player,
                           goals : goals
                       },
                       success(resp){
                           window.location.reload();
                       }
                   })
               })
               
           })
       })
    }
</script>
@endsection

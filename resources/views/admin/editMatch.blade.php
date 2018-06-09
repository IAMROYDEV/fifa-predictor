@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
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
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team2 Score</label>
                            <input type="text" name="team2_score" class="form-control" value="{{$match->team2_score}}">
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
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Matches</h3>
        </div>
        <form class="" action="{{ route('addmatches') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Select Tournament</label>
                            <select name="world_cup_id" class="form-control custom-select">
                                <option value="all" data-data=''> -- Select tournament -- </option>
                                @foreach($tournaments as $tournament)
                                <option value="{{$tournament->id}}" data-data=''>
                                    {{$tournament->place}} {{$tournament->year}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Match Date</label>
                            <input type="text" name="played_date" class="form-control" data-mask="YYYY-MM-DD HH:MM:SS" data-mask-clearifnotmatch="true" placeholder="YYYY-MM-DD HH:MM:SS (In UTC)" autocomplete="off" maxlength="19">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team1</label>
                            <select name="team1" class="form-control custom-select">
                                <option value="all" data-data=''> -- Select team1 -- </option>
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" data-data=''>
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
                                <option value="all" data-data=''> -- Select team2 -- </option>
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" data-data=''>
                                    {{str_replace('_',' ',$team->name)}}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team1 Score</label>
                            <input type="text" name="team1_score" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Team2 Score</label>
                            <input type="text" name="team2_score" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto">Save match</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Matches</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Team1</th>
                                <th>Team2</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="add-ply-tbody">
                            @if($matches)
                            @foreach($matches as $key=>$match)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td>
                                    {{$match->teamA->name}} 
                                </td>
                                <td>
                                    {{$match->teamB->name}} 
                                </td>
                                <td>
                                    {{$match->played_date}} 
                                </td>
                                <td>
                                    <a class="icon" href="{{route('editmatch', $match->id)}}">
                                        <i class="fe fe-edit"></i>
                                    </a>
                                    &nbsp; &nbsp;
                                    <a class="icon" href="{{route('deletematch', $match->id)}}">
                                        <i class="fe fe-trash"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

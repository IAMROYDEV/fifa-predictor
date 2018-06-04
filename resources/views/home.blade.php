@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select Players</h3>
        </div>
        <form class="" action="{{ route('selectteam') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Teams</label>
                    <select name="team" class="form-control custom-select" id="select-countries">
                        <option value="0"> -- Select team -- </option>
                        @foreach($teams as $team)
                        <option value="{{$team->code}}" data-data='{"image":"/assets/images/flags/{{$team->code}}.svg"}' {{ ($slectedCode == $team->code ? "selected":"") }}>
                                    {{str_replace('_',' ',$team->name)}}
                                </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label class="form-label">Input group</label>
                    <div class="input-group">
                        <input value="{{ $searchKey }}" name="search" type="text" class="form-control" placeholder="Search for...">

                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-pill btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Select players</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Goals</th>
                                <th>Team</th>
                                <th>Add to Squad</th>
                            </tr>
                        </thead>
                        <tbody class="add-ply-tbody">
                            @if($players)
                                @foreach($players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        {{$player->name}}
                                    </td>
                                    <td>
                                        {{$player->position}}
                                    </td>
                                    <td>
                                        {{$player->goals}}
                                    </td>
                                    <td>
                                        {{$player->team->name}}
                                    </td>
                                    <td>
                                        @if(isPlayerAdded($player->id))
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-pill btn-outline-primary add-squad"><i class="fe fe-minus mr-2"></i>Remove</button>
                                        @else
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-pill btn-outline-primary add-squad"><i class="fe fe-plus mr-2"></i>Add</button>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your Players</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Goals</th>
                                <th>Team</th>
                                <th>Add to Squad</th>
                            </tr>
                        </thead>
                        <tbody class="remove-ply-tbody">
                            @if($user->players)
                                @foreach($user->players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        {{$player->name}}
                                    </td>
                                    <td>
                                        {{$player->position}}
                                    </td>
                                    <td>
                                        {{$player->goals}}
                                    </td>
                                    <td>
                                        {{$player->team->name}}
                                    </td>
                                    <td>
                                        <button data-player="{{$player->id}}" type="button" class="btn btn-pill btn-outline-primary add-squad"><i class="fe fe-minus mr-2"></i>Remove</button>
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
@section('sub-scripts')
<script>
        window.onload = function () {
                require(['jquery', 'selectize'], function ($, selectize) {
                        $('select').selectize({
                                render: {
                                        option(data, escape) {
                                                return (
                                                                `<div>
                            <span class="image"><img src="${data.image}" /></span>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                                                                );
                                        },
                                        item(data, escape) {
                                                return (
                                                                `<div>
                            <span class="image"><img src="${data.image}" /></span>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                                                                );
                                        }
                                }
                        });
                })

            jQuery(document).on('click', '.add-squad', function() {
                var playerId = jQuery(this).data("player");
                var self = jQuery(this);
                $.ajax({
                    type: "GET",
                    url: "/users/add-players/"+playerId,
                    success: function(data) {
                        if(data.results == 0) {
                            $('.remove-ply-tbody .tr-'+playerId).remove();
                            $('.add-ply-tbody .tr-'+playerId+' button').html('<i class="fe fe-plus mr-2"></i>Add');
                        } else {
                            $('.add-ply-tbody .tr-'+playerId+' button').html('<i class="fe fe-minus mr-2"></i>Remove');
                            $('.remove-ply-tbody').append(data);
                        }
                    }
                });
            });

        }


</script>
@endsection

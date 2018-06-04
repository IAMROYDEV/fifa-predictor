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
                        <option value="all" data-data='{"image":"/assets/images/flags/select-team.png"}'> -- Select team -- </option>
                        @foreach($teams as $team)
                        <option value="{{$team->code}}" data-data='{"image":"/assets/images/flags/{{$team->code}}.svg"}' {{ ($slectedCode == $team->code ? "selected":"") }}>
                                    {{str_replace('_',' ',$team->name)}}
                                </option>
                        @endforeach
                    </select>

                </div>
                
                <div class="form-group">
                    <label class="form-label">Select Player</label>
                    <select name="player" class="form-control custom-select" id="select-players">
                        <option value="0"> Search players.. </option>
                        @foreach($players as $player)
                        <option value="{{$player->id}}">
                            {{str_replace('_',' ',$player->name)}}
                        </option>
                        @endforeach
                    </select>

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
                                <th>Goals</th>
                                <th>Team</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="add-ply-tbody">
                            @if($players)
                                @foreach($players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        {{$player->name}} ({{$player->position}})
                                    </td>
                                    <td>
                                        {{$player->goals}}
                                    </td>
                                    <td>
                                        {{$player->team->name}}
                                    </td>
                                    <td>
                                        @if(isPlayerAdded($player->id))
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad"><i class="fe fe-trash "></i> Remove</button>
                                        @else
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-success btn-block add-squad"><i class="fe fe-plus "></i>Add</button>
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
                                <th>Goals</th>
                                <th>Team</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="remove-ply-tbody">
                            @if($user->players)
                                @foreach($user->players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        {{$player->name}} ({{$player->position}})
                                    </td>
                                    <td>
                                        {{$player->goals}}
                                    </td>
                                    <td>
                                        {{$player->team->name}}
                                    </td>
                                    <td>
                                        <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad"><i class="fe fe-trash "></i> Remove</button>
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
            setTimeout(function(){
                require(['jquery', 'selectize'], function ($, selectize) {
                        $('#select-countries').selectize({
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
                        
                        $('#select-players').selectize({
                                render: {
                                        option(data, escape) {
                                                return (
                                                                `<div>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                                                                );
                                        },
                                        item(data, escape) {
                                                return (
                                                                `<div>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                                                                );
                                        }
                                }
                        });
                })
            
                jQuery('#select-countries').change(function() {
                    var team = $( this ).val();
                    if(!team)
                        return;
                    var queryParameters = {}, queryString = location.search.substring(1),
                        re = /([^&=]+)=([^&]*)/g, m;

                    // Creates a map with the query string parameters
                    while (m = re.exec(queryString)) {
                        queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                    }

                    // Add new parameters or update existing ones
                    queryParameters['team'] = team;
    //                queryParameters[''] = '';

                    location.search = $.param(queryParameters); // Causes page to reload
                });

                jQuery('#select-players').change(function() {
                    var playerId = parseInt($( this ).val());
                    selectplayer(playerId);
                });

                jQuery(document).on('click', '.add-squad, #select-players', function() {
                    var playerId = jQuery(this).data("player");
                    selectplayer(playerId);
                });
                
                
                function selectplayer(playerId) {
                    if(!playerId)
                        return;
                    $.ajax({
                        type: "GET",
                        url: "/users/add-players/"+playerId,
                        success: function(data) {
                            if(data.results == 0) {
                                $('.remove-ply-tbody .tr-'+playerId).remove();
                                $('.add-ply-tbody .tr-'+playerId+' button').html('<i class="fe fe-plus mr-2"></i>Add');
                            } else {
                                $('.add-ply-tbody .tr-'+playerId+' button').html('<i class="fe fe-minus mr-2"></i> Remove');
                                $('.remove-ply-tbody').append(data);
                            }
                            $('.add-ply-tbody .tr-'+playerId+' button').toggleClass('btn-success');
                            $('.add-ply-tbody .tr-'+playerId+' button').toggleClass('btn-danger');
                        }
                    });
                }
                
                
            }, 1000);
        }


</script>
@endsection

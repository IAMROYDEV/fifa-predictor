@extends('layouts.app')

@section('content')

<div class="container">
    @if(!$user->is_team_locked)
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
    
    <div class="alert alert-icon alert-danger" role="alert">
        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> Your squad is currently not locked. To enroll your squad in the tournament it needs to be locked.
        For further information read our <a href="/rules">Rules.</a>
      </div>
    @endif
    <div class="row">
        @if(!$user->is_team_locked)
            <div class="col d-md-none d-none d-lg-block">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Select players</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="add-ply-tbody">
                            @if($players)
                                @foreach($players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        <img src="/assets/images/flags/{{$player->team->code}}.svg" title="{{$player->team->name}}" alt="{{$player->team->name}}" height="15px" /> {{$player->name}} ({{$player->position}})
                                    </td>
                                    <td>
                                        @if(isPlayerAdded($player->id))
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad remove-squad"><i class="fe fe-trash "></i> Remove</button>
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
        @endif
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your Players</h3>
                    @if(!$user->is_team_locked)
                    <div class="row button-right" style=" right: 30px;"><button class="btn btn-pill btn-secondary lock-team"><i class="fe fe-lock mr-2"></i>Lock the team</button></div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Captain</th>
                                @if(!$user->is_team_locked)
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="remove-ply-tbody">
                            @if($user->players)
                                @foreach($user->players as $player)
                                <tr class="tr-{{$player->id}}">

                                    <td>
                                        <img src="/assets/images/flags/{{$player->team->code}}.svg" title="{{$player->team->name}}" alt="{{$player->team->name}}" height="15px" /> {{$player->name}} ({{$player->position}})
                                    </td>
                                    <td>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="your-captain" value="{{$player->id}}" {{ ($user->player_id == $player->id ? "checked":"") }}>
                                            <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    @if(!$user->is_team_locked)
                                        <td>
                                            <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad remove-squad"><i class="fe fe-trash "></i> Remove</button>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if(!$user->is_team_locked)
            <div class="row  text-center justify-content-center"><button class="btn btn-pill btn-secondary lock-team"><i class="fe fe-lock mr-2"></i>Lock the team</button></div>
            @endif
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
                    var totalPlayer = jQuery('.remove-ply-tbody tr').length;
                    
                    if(!(jQuery(this).hasClass('remove-squad')) && totalPlayer == 11) {
                        alert('Maximum 11 players allowed!');
                        return;
                    }
                    selectplayer(playerId);
                });

                jQuery(document).on('click', '.add-squad, #select-players', function() {
                    var playerId = jQuery(this).data("player");
                    var totalPlayer = jQuery('.remove-ply-tbody tr').length;
                    
                    if(!(jQuery(this).hasClass('remove-squad')) && totalPlayer == 11) {
                        alert('Maximum 11 players allowed!');
                        return;
                    }
                    selectplayer(playerId);
                });
                
                jQuery(document).on('click', 'input[name=your-captain]', function() {
                    var captainId = jQuery(this).val();
                    $.ajax({
                        type: "GET",
                        url: "/users/select-captain/"+captainId,
                        success: function(data) {
                            if(!(data) || (data && data.results != 1)) {
                                alert('Something went wrong on server side!');
                            }
                        }
                    });
                });
                
                $('.lock-team').click(function(){
                    var totalPlayer = jQuery('.remove-ply-tbody tr').length;
                    var yourCaptain = $('input[name=your-captain]:checked').val();
                    if(totalPlayer < 11) {
                        alert('Please select 11 players to lock the team!');
                        return;
                    }
                    if(!yourCaptain) {
                        alert('Please select captain for your team!');
                        return;
                    }
                    var r = confirm("Are you sure you want to lock your squad?\nChanges can't be reverted back!!");
                    if(r) {
                        $.ajax({
                            type: "GET",
                            url: "/lock-squad",
                            success: function(data) {
                                if(!(data) || (data && data.results != 1)) {
                                    alert('Something went wrong on server side!');
                                    return;
                                } else {
                                    //redirect to dashboard
                                    window.location.href = "{{route('user.dashboard')}}"
//                                    window.location.reload();
                                }
                            }
                        });
                    }
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
                                $('.add-ply-tbody .tr-'+playerId+' button').addClass('remove-squad');
                                $('.add-ply-tbody .tr-'+playerId+' button').html('<i class="fe fe-trash mr-2"></i> Remove');
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

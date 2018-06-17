<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your Top Scorer Squad</h3>
        @include('leaderboard.current-rank',['type'=>'squad'])
        
        <i class="fe fe-help-circle button-right" data-toggle="tooltip" data-placement="top" title="Create a squad of 11 players. who will score the most goals during the entire tournament. Each goal by the player in your squad will earn you 10 points and double the points for the selected captain. Make sure you lock the squad to start collecting points.!!"></i>
    </div>
    <div class="card-body" style="overflow-x: scroll;">
        @if($user->is_team_locked)
            @if(auth()->user()->squad_score)
                <p class="text-center">
                    <b>Your squad score {{auth()->user()->squad_score}} ⭐ </b>
                </p>
            @endif
            <table class="table card-table table-vcenter text-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Team</th>
                        @if(!$user->is_team_locked)
                        <th class=""></th>
                        @endif
                    </tr>
                </thead>
                <tbody class="remove-ply-tbody">
                    @if($user->players)
                        @foreach($user->players as $player)
                        <tr class="tr-{{$player->id}}">

                            <td>
                                
                                @if($user->player_id == $player->id)
                                    <b>
                                        {{str_replace("(captain)", '', $player->name)}} ({{$player->position}})
                                        <span style="color: #0000ff;">(Captain)</span>
                                    </b>
                                @else
                                    {{str_replace("(captain)", '', $player->name)}} ({{$player->position}})
                                @endif
                            </td>
                            <td>
                                <img src="/assets/images/flags/{{$player->team->code}}.svg" title="{{$player->team->name}}" alt="{{$player->team->name}}" height="15px" /> 
                                
                            </td>
                            @if(!$user->is_team_locked)
                            <td class="">
                                    <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad remove-squad"><i class="fe fe-trash "></i></button>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @else
        <div class="row">
            <div class="col text-center">
                <a href="{{route('userSquad')}}" class="btn btn-pill btn-secondary ">
                    <i class="fe fe-users"></i>
                    Create or lock your squad
                </a>
                
            </div>
        </div>
        @endif
    </div>
</div>

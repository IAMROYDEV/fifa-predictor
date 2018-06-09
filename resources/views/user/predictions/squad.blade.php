<div class="card">
    <div class="card-header">
        <h3 class="card-title">Your Top Scorer Squad</h3>
    </div>
    <div class="card-body">
        @if($user->is_team_locked)
            <table class="table card-table table-vcenter text-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Team</th>
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
                                {{$player->name}} ({{$player->position}})
                                @if($user->player_id == $player->id)
                                    <span style="color: #0000ff;">(Captain)</span>
                                @endif
                            </td>
                            <td>
                                <img src="/assets/images/flags/{{$player->team->code}}.svg" title="{{$player->team->name}}" alt="{{$player->team->name}}" height="15px" /> 
                                
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

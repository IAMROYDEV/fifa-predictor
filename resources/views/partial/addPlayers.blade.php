
@if($player)
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
@endif
                
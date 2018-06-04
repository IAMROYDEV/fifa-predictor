
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
        <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-primary btn-danger add-squad"><i class="fe fe-trash "></i></button>
    </td>

</tr>
@endif
                

@if($player)
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
@endif
                
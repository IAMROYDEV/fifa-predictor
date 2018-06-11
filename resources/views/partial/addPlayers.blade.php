
@if($player)
<tr class="tr-{{$player->id}}">

    <td>
        <img src="/assets/images/flags/{{$player->team->code}}.svg" title="{{$player->team->name}}" alt="{{$player->team->name}}" height="15px" /> {{$player->name}} ({{$player->position}})
    </td>
    <td>
        <label class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" name="your-captain" value="{{$player->id}}">
            <span class="custom-control-label"></span>
        </label>
    </td>
    <td>
        <button data-player="{{$player->id}}" type="button" class="btn btn-icon btn-danger btn-block add-squad remove-squad"><i class="fe fe-trash "></i> Remove</button>
    </td>

</tr>
@endif
                
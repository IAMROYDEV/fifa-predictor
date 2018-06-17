<?php $self=$selfRank->firstWhere('type',$type) ?>
@if($self && $self->rank > $rankLimit)
    <tr class="self-rank">
        <td>
            {{$self->rank}}
            @if($self->up_down)
                <i class="fa fa-chevron-{{$self->up_down}}"></i>
            @endif
        </td>
        <td>
            <img src="{{$self->user->avatar}}" class="img-circle" alt="" style="height:40px">
            @if($self->up_down && $self->rank_diff)
                <span class="label label-{{$self->rank_diff > 0 ?'success' : 'danger'}}">
                    {{$self->rank_diff>0?'+':''}}{{$self->rank_diff}}
                </span>
            @endif
            {{$self->user->name}}
        </td>
        <td>
            {{$self->points}}
        </td>
    </tr>
@endif
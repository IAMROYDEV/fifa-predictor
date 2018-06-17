<?php $lead=$user->leaderboards->firstWhere('type',$type) ?>
@if($lead && count($lead))
    <a href="/leaderboard/{{$type}}" title="click here to see full table" class="btn btn-sm 
    @if($lead->up_down==='down')
        btn-outline-danger
    @elseif($lead->up_down==='up')
        btn-outline-success
    @else
        btn-outline-primary
    @endif
    button-right">
        @if($lead->up_down==='up')
            <i class="fe fe-arrow-up"></i>
        @elseif($lead->up_down==='down')
            <i class="fe fe-arrow-down"></i>
        @endif
        Rank : {{$lead->rank}}
    </a>
@endif
<div class="clearfix"></div>
<table class="table table-hover table-outline table-vcenter text-nowrap card-table" style="text-align:left">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matchSquads as $squad)
            <tr>
                <td>
                    {{$squad->rank}}
                </td>
                <td>
                    <img src="{{$squad->user->avatar}}" class="img-circle" alt="" style="height:40px">
                    {{$squad->user->name}}
                </td>
                <td>
                    {{$squad->points}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{Form::open(['route'=>'user.favourite'])}}
{{Form::hidden('predictor','golden boot')}}
<?php $data=$predictions->where('predictor', 'golden boot')->first(); ?>
<div class="card">
    <div class="card-header">
        Golden Boot Winner
        @if($allowChange && $data)
            <a href="?change=golden boot" class="btn btn-success button-right">
                <i class="fe fe-plus-square"></i>  Change
            </a>
        @endif
        <i class="fe fe-help-circle button-right" data-toggle="tooltip" data-placement="top" title="Predict who will win the Golden Boot 👞 and earn bonus 100⭐ points!!"></i>
    </div>
    <div class="card-body">
        @if($changeField!=='golden boot' && $data)
             <div class="row">
                 <div class="col-sm-2 text-center">
                 <img src="/assets/images/flags/{{$data->player->team->code}}.svg" alt=""
                 title="{{$data->player->team->name}}">
                </div>
                <div class="col-sm-8 text-center">
                    <h1>{{$data->player->name}}</h1>
                </div>
             </div>
        @else
        <div class="row">
           <div class="form-group col-md-12">
               <select name="player_id" id="player_id" class="form-control" required>
                   <option value="">Select Player</option>
                    @foreach($players as $player)
                    {{-- {{ ($slectedCode == $player->code ? "selected":"") }} --}}
                        <option value="{{$player->id}}" 
                            {{ ($data && $data->player_id == $player->id ? "selected":"") }}
                            data-data='{"image":"/assets/images/flags/{{$player->team->code}}.svg"}' >
                            {{str_replace('_',' ',$player->name)}}
                        </option>
                    @endforeach
               </select>
           </div>
         </div>
         <div class="row">
             <div class="col text-center">
               <button type="submit" class="btn btn-pill btn-secondary">
                   <i class="fe fe-check"></i> Save
               </button>
             </div>
         </div>
         @endif
         <div class="row row-cards row-deck"></div>
    </div>
</div>
{{Form::close()}}

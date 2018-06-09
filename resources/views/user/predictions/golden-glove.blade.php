{{Form::open(['route'=>'user.favourite'])}}
{{Form::hidden('predictor','golden glove')}}
<div class="card">
    <div class="card-header">
        Golden Glove Winner
        @if($allowChange)
            <a href="?change=golden glove" class="btn btn-success button-right">
                <i class="fe fe-plus-square"></i>  Change
            </a>
        @endif
    </div>
    <div class="card-body">
        <?php $data=$predictions->where('predictor','golden glove')->first(); ?>
        @if($changeField!=='golden glove' && $data)
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
                   <option value="">Select Team</option>
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
             <div class="col-md-4 offset-md-4">
               <button type="submit" class="btn btn-pill btn-secondary">
                   <i class="fe fe-check"></i> Mark as Favourite
               </button>
             </div>
         </div>
         @endif
         <div class="row row-cards row-deck"></div>
    </div>
</div>
{{Form::close()}}

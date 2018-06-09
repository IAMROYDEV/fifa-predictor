{{Form::open(['route'=>'user.favourite'])}}
{{Form::hidden('predictor','golden ball')}}
<div class="card">
    <div class="card-header">Golden Ball Winner</div>
    <div class="card-body">
         @if($predictions->contains('predictor','golden ball'))
         <?php $data=$predictions->where('predictor','golden ball')->first(); ?>
             <div class="row">
                 <div class="col-sm-2 text-center">
                 <img src="/assets/images/flags/{{$data->player->team->code}}.svg" alt="">
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
                        <option value="{{$player->id}}" data-data='{"image":"/assets/images/flags/{{$player->team->code}}.svg"}' >
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
        <div class="row row-cards row-deck"></div>
        @endif
    </div>
</div>
{{Form::close()}}

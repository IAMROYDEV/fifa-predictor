{{Form::open(['route'=>'user.favourite'])}}
{{Form::hidden('predictor','favourite team')}}
<div class="card">
    <?php $data=$predictions->where('predictor', 'favourite team')->first(); ?>
    
    <div class="card-header">
        Your Favourite Team
        @if($allowChange && $data)
            <a href="?change=favourite team" class="btn btn-success button-right">
                <i class="fe fe-plus-square"></i>  Change
            </a>
        @endif
        <i class="fe fe-help-circle button-right" data-toggle="tooltip" data-placement="top" title="Select the team that you support ♥️ for the FIFA 2018 world cup!!"></i>
    </div>
    <div class="card-body">
         @if($changeField!=='favourite team'  && $data)
         <div class="row">
             <div class="col-sm-12 text-center">
                 <h1>{{$data->team->name}}</h1>
             </div>
             <div class="col-sm-12 text-center">
                 <img src="/assets/images/flags/{{$data->team->code}}.svg" alt="" height="120">
             </div>
         </div>
         @else
        <div class="row">
           <div class="form-group col-md-12">
               <select name="team_id" id="team_id" class="form-control" required>
                   <option value="">Select Team</option>
                    @foreach($teams as $team)
                    {{-- {{ ($slectedCode == $team->code ? "selected":"") }} --}}
                        <option value="{{$team->id}}" 
                            {{ ($data && $data->team_id == $team->id ? "selected":"") }}
                            data-data='{"image":"/assets/images/flags/{{$team->code}}.svg"}' >
                            {{str_replace('_',' ',$team->name)}}
                        </option>
                    @endforeach
               </select>
           </div>
         </div>
         <div class="row">
             <div class="col text-center">
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


{{Form::open(['route'=>'user.favourite'])}}
{{Form::hidden('predictor','world cup winner')}}
<div class="card">
    <?php $data=$predictions->where('predictor','world cup winner')->first(); ?>
    <div class="card-header">
        World Cup Winners
        @if($allowChange && $data)
        <a href="?change=world cup winner" class="btn btn-success button-right">
            <i class="fe fe-plus-square"></i>  Change
        </a>
        @endif
        <i class="fe fe-help-circle button-right" data-toggle="tooltip" data-placement="top" title="Predict who will win the 2018 FIFA world cup and earn bonus 120 points!!"></i>
    </div>
    <div class="card-body">
         @if($changeField!=='world cup winner' && $data)
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
<script>
    window.onload=function(){
        require(['jquery', 'selectize'], function ($, selectize) {
            $(function(){
                $('#team_id,#player_id').selectize({
                    render: {
                            option:function(data, escape) {
                                    return (`
                                    <div>
                                        <span class="image"><img src="${data.image}" /></span>
                                        <span class="title">${escape(data.text)}</span>
                                    </div>`
                                    );
                            },
                            item:function(data, escape) {
                                    return (`
                                <div>
                                    <span class="image"><img src="${data.image}" /></span>
                                    <span class="title">${escape(data.text)}</span>
                                </div>
                                `);
                            }
                        }
                    });
                })
            });
        }
</script>
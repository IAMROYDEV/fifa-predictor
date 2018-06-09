@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-12">
    <form class="card" id="filter-prediction" action="/match/prediction/1" method="get">
      <div class="card-body">
        <div class="form-group">
          <label class="form-label">Stages</label>
          <select name="stage" class="form-control custom-select" id="select-stage">
            <option value=""> Select stage </option>
            @foreach($stages as $stage)
            <option {{ ($selectStage == $stage->id ? "selected":"") }} value="{{$stage->id}}">
              {{$stage->title}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
    </form>
  </div>
  </div>
	<div class="row">
		@foreach ($matches as $match)
		<div class="col-md-6">
			<form class="card prediction-form" action="/match/prediction/set" method="post">
                      @csrf
                      <input type="hidden" name="match_id" value="{{$match->id}}">
                      <div class="card-body p-3
                       {{$match->user_team1_score !== null && $match->user_team2_score !== null ? 'border border-success':''}}">
                       <div class="row">
                        <div class="col-9 col-sm-9 col-md-10">
                        <div class="text-muted mb-4">
                          {{$match->matchStage->title}}
						              @if($match->played_date):
                          {{date('D, d/m h:i A', strtotime($match->played_date))}}
                          @endif
                          @if($match->locked)
                          <i class="fe fe-lock"></i>
                          @endif
                        </div>
                        </div>
                        <div class="col-3 col-sm-3 col-md-2 alert-link text-center">
                          @if($match->user_points !== null)
                          {{$match->user_points}}<i class="fe fe-star"></i>
                          @endif
                        </div>
                      </div>
                        <div class="h5 mb-4 form-group">
                        	<div class="row">
                        	<div class="col-9 col-sm-9 col-md-10">
                        	<i class="p-2"><img src="/assets/images/flags/{{$match->teamA->code}}.svg" title="{{$match->teamA->name}}" alt="{{$match->teamA->name}}" width="40" class="border border-light rounded" /></i>{{$match->teamA->name}}
                        	</div>
                        	<div class="col-3 col-sm-3 col-md-2">
                            @if($match->user_team1_score !== null)
                        		<input name="team1_score" type="text" data-mask="00" class="form-control text-center alert-link" value="{{$match->user_team1_score}}" {{$match->locked === 0 ? '' : 'disabled'}} onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            @else
                            <input name="team1_score" type="text" data-mask="00" class="form-control text-center alert-link" {{$match->locked === 0 ? '' : 'disabled'}} onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            @endif
                        	</div>
                        	</div>
                        </div>
                        <div class="h5 mb-2">
                        	<div class="row">
                        	<div class="col-9 col-sm-9 col-md-10">
                        	<i class="p-2"><img src="/assets/images/flags/{{$match->teamB->code}}.svg" title="{{$match->teamB->name}}" alt="{{$match->teamB->name}}" width="40" class="border border-light rounded" /></i>{{$match->teamB->name}}
                       		</div>
                       		<div class="col-3 col-sm-3 col-md-2">
                            @if($match->user_team2_score !== null)
								            <input name="team2_score" type="text" data-mask="00" class="form-control text-center alert-link" value="{{$match->user_team2_score}}" {{$match->locked === 0 ? '' : 'disabled'}} onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            @else
                            <input name="team2_score" type="text" data-mask="00" class="form-control text-center alert-link" {{$match->locked === 0 ? '' : 'disabled'}} onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                            @endif

							</div>
							</div>
            </div>
          </div>
        </div>
		</form>
		@endforeach
	</div>
</div>

@endsection
@section('sub-scripts')
<script>
window.onload = function () {
  require(['jquery'], function ($, selectize) {
      $( "#select-stage" ).change(function() {
          $("#filter-prediction").submit();
      });
      $( ".prediction-form input" ).change(function() {
          var _formP = $(this).closest("form");
          var _score1 = _formP.find('input[name="team1_score"]').val();
          var _score2 = _formP.find('input[name="team2_score"]').val();
          if (_score1 != '' && _score2 != '') {
            _formP.find('.card-body').removeClass('border border-success');
            $.ajax({
              type : 'POST',
              url : _formP.attr("action"),
              data : _formP.serialize(),
              success: function(data) {
                _formP.find('.card-body').addClass('border border-success');
              }
            });
          }
      });
    });
}

</script>
@endsection


@extends('layouts.app')

@section('content')
<div class="container dashboard">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                @include('user.predictions.favourite-team')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-ball')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-boot')
            </div>
            <div class="col-md-12">
                @include('user.predictions.golden-glove')
            </div>
            <div class="col-md-12">
                @include('user.predictions.worldcup-winner')
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                @include('user.predictions.current-match', ['currentMatch' => $currentMatch, 'currentMatchPrediction' => $currentMatchPrediction])
            </div>
            <div class="col-md-12">
                @include('user.predictions.squad')
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('sub-scripts')
<script>
    window.onload = function () {
        $.getJSON('https://timezoneapi.io/api/ip', function(data){
            // Request OK?
            if(data.meta.code == '200'){
                var city = data.data.timezone.id;
                $.ajax({
                    type: "GET",
                    url: "/users/set-timezone?timezone="+city,
                    success: function(data) {
                        console.log(data);
                    }
                });
            }
        });
        
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
@endsection
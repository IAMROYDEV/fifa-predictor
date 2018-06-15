@extends('layouts.app')

@section('content')
<div class="container dashboard">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                @include('user.predictions.current-match', ['currentMatch' => $currentMatch, 'currentMatchPrediction' => $currentMatchPrediction])
            </div>
            <div class="col-md-12">
                @include('user.predictions.squad')
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                @include('user.predictions.favourite-team')
            </div>
            <div class="col-md-12">
                @include('user.predictions.worldcup-winner')
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
        </div>
    </div>
</div>
@include('alert')
@endsection
@section('sub-scripts')
<script>
    window.onload = function () {
        function getOffset(){
                var d=new Date().getTimezoneOffset();
                return (d+(2*-d));
            }
            document.cookie = `timezone=${getOffset()}`
        $.ajax({
                    type: "GET",
                    url: "/users/set-timezone?timezone="+getOffset(),
                    success: function(data) {
                        console.log(true);
                    }
        });
        $.getJSON('https://timezoneapi.io/api/ip', function(data){
            // Request OK?
            if(data.meta.code == '200'){
                var city = data.data.timezone.id;
                $.ajax({
                    type: "GET",
                    url: "/users/set-timezone-city?timezoneCity="+city,
                    success: function(data) {
                        console.log(true);
                    }
                });
            }
        });
        require(['jquery', 'selectize'], function ($, selectize) {
                $(function(){
                    $('.global-choice').change(function(){
                        let th=$(this);
                        let predictor = th.closest('form').find('[name=predictor]').val();
                        $.post({
                            url : "{{route('user.favourite')}}",
                            data : {
                                predictor,
                                ...(th.attr('name')==='player_id' ? {'player_id':th.val()}:{'team_id':th.val()})
                            },
                            success : function(resp){
                                $('#alert-success').html(`${resp.message} predictions`)
                                $('#alert-success').parent().attr('style','display:block')
                                window.location.href=window.location.href.split('?').shift();
                                $('#alert-success').parent().fadeOut(5000);
                            },error(err){
                                var resp=err && err.responseJSON && err.responseJSON.message
                                $('#alert-danger').html(`${resp}`)
                                $('#alert-danger').parent().attr('style','display:block')
                                $('#alert-danger').parent().fadeOut(5000);
                            },always(){

                            }
                        })
                    });
                })
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
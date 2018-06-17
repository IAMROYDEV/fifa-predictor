@extends('main')

 {{-- @include('leaderboard.squad')
                        @include('leaderboard.match-prediction')
                        @include('leaderboard.all') --}}
@section('content')
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="border-bottom:none;background-color:#fff">
            <h3 class="card-title" >Leaderboard</h3>
            </div>
            <div class="card-body">
                @include('tabs')
            </div>
        </div>
    </div>
</div>
<script>
//    window.onload=function(){
//         require(['bootstrap'],function(core){
//             $(function(){
//                 // alert('1')
//             })
//         })
//    }
</script>
@endsection
@section('metadata')
<title>Leaderboard - fifa8teen</title>
@endsection

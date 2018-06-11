@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <div class="row">
                            <div class="col-md-9"><p>Select the world cup</p></div>
                            <div class="col-md-3"><p><a href="#">+add world cup</a></p></div>
                        </div>
                    <div class="row row-cards row-deck">
                    
                    @foreach ($worldCups as $worldCup)
                    <div class="col-sm-6 col-xl-3">
                    <div class="card">
                  <img class="card-img-top" src="{{$worldCup->logo}}" alt="{{$worldCup->year}}" height="200px">
                  <div class="card-body d-flex flex-column">
                    <h4><a href="/admin/worldcup/{{$worldCup->id}}">{{$worldCup->place}} {{$worldCup->year}}</a></h4>
                    <div class="text-muted">Last Date: {{$worldCup->last_submission}}</div>
             
                    </div>
                  </div>
                     </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

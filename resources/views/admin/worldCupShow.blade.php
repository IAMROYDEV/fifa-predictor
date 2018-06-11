@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                        
                            <p>Details world cup: {{$worldCup->year}}</p>
                        
                            <hr>
                    <div class="row row-cards row-deck">
                    <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">{{count($teams)}}</div>
                    <div class="text-muted mb-4">Teams</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">{{count($players)}}</div>
                    <div class="text-muted mb-4">players</div>
                  </div>
                </div>
              </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

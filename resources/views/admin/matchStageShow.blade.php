@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$matchStage->title}}</h3>
                <div class="card-options">
                  <a class="btn btn-primary" href="/admin/match-stages/edit/{{$matchStage->id}}"><i class="fe fe-edit"></i></a>
                </div>
              </div>
              <div class="card-body">
                <div class="row my-8">
                  <div class="col-6">
                    <p class="h3">Company</p>
                    <address>
                      Street Address<br>
                      State, City<br>
                      Region, Postal Code<br>
                      ltd@example.com
                    </address>
                  </div>
                  <div class="col-6 text-right">
                    <p class="h3">Client</p>
                    <address>
                      Street Address<br>
                      State, City<br>
                      Region, Postal Code<br>
                      ctr@example.com
                    </address>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select Players</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Teams</label>
                <select name="team" class="form-control custom-select" id="select-countries">
                   
                @foreach($teams as $team)
                    <option value="{{$team->code}}" data-data='{"image":"/assets/images/flags/{{$team->code}}.svg"}'>
                        {{str_replace('_',' ',$team->name)}}
                    </option>
                @endforeach
                </select>

            </div>
            <div class="form-group">
                <label class="form-label">Input group</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Select Players</h3>
                </div>
                <div class="card-body">
                    here ew go
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your Players</h3>
                </div>
                <div class="card-body">
                    here we go
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('sub-scripts')
<script>
    window.onload=function(){
       require(['jquery','selectize'],function($,selectize){
           $('select').selectize({
               render : {
                   option(data,escape){
                       return (
                        `<div>
                            <span class="image"><img src="${data.image}" /></span>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                        );
                   },
                   item(data,escape){
                       return (
                        `<div>
                            <span class="image"><img src="${data.image}" /></span>
                            <span class="title">${escape(data.text)}</span>
                        </div>`
                        );
                   }
               }
           });
        }) 
    }
    
    
</script>
@endsection

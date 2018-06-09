@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Invoices</h3>
                <a href="/admin/match-stages/add" class="btn btn-default pull-right">Add</a>
                </div>
                <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                    <tr>
                        <th class="w-1">No.</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($matchStages as $matchStage)
                            <tr>
                                <td>
                                    <span class="text-muted">
                                        {{$matchStage->id}}
                                    </span>
                                </td>
                                <td>
                                    <a href="/admin/match-stages/{{$matchStage->id}}" class="text-inherit">
                                        {{$matchStage->title}}
                                    </a>
                                </td>
                                <td>
                                    {{$matchStage->created_at}}
                                </td>
                                <td>
                                    {{$matchStage->updated_at}}
                                </td>
                                <td>
                                    <a class="icon" href="/admin/match-stages/edit/{{$matchStage->id}}">
                                        <i class="fe fe-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

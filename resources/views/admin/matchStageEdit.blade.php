@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="/admin/match_stages/{{$matchStage->id}}" method="post" class="card">
                @method('PUT')
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add Match Stage</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Text.." value="{{ old('title', $matchStage->title) }}">
                            @if ($errors->any())
                                <div class="validation-error">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="/admin/match_stages/" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Send data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

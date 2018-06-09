@extends('layouts.app')

@section('content')
<div class="container">
    <div class"row justify-content-center">
        <div class="col-md-12">
            <form action="/admin/global-settings" method="post" class="card">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add new global settings key</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Rule</label>
                            <input type="text" class="form-control" name="rule" placeholder="Text.." value="{{old('rule')}}">
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
                        <div class="form-group col-md-4">
                            <label class="form-label">On/Off</label>
                            <label class="custom-switch">
                                <input type="checkbox" name="flag" class="custom-switch-input" {{old('flag') ? 'checked':''}}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-primary ml-auto">Send data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Global Settings</h2>
                </div>
                <table class="table card-table">
                    @foreach($globalSettings as $globalSetting)
                        <tr>
                            <td>{{$globalSetting->rule}}</td>
                            <td class="text-right">
                            <span class="">
                                <label class="custom-switch">
                                    <form action="/admin/global-settings/{{$globalSetting->id}}" method="post" id="global-setting-form-{{$globalSetting->id}}">
                                        @method('PUT')
                                        @csrf
                                        <input type="checkbox" name="flag" class="custom-switch-input global-setting-checkbox" {{$globalSetting->flag ? 'checked':''}}>
                                        <span class="custom-switch-indicator"></span>
                                    </form>
                                </label>
                            </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sub-scripts')
<script>
    setTimeout(() => {
        require(['jquery'],function($){
            $(function(){
                $(document).on('change', '.global-setting-checkbox', function() {
                    $(this).closest('form').submit();
                });
            })
        })
    }, 1000);

</script>
@endsection

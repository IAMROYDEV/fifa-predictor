@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Users</h2>
                </div>
                <table class="table card-table">
                    @foreach($users as $user)
                        <tr>
                            <td><span class="avatar avatar-xl" style="background-image: url({{$user->avatar}})"></span></td>
                            <td class="text-left">{{$user->name}}</td>
                            <td class="text-left">{{$user->email}}</td>
                            <td class="text-right">
                            <span class="">
                                <label class="custom-switch">
                                    <form action="/admin/users/{{$user->id}}" method="post" id="user-admin-form-{{$user->id}}">
                                        @method('PUT')
                                        @csrf
                                        <input type="checkbox" name="is_admin" class="custom-switch-input user-admin-checkbox" {{$user->is_admin ? 'checked':''}}>
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
                $(document).on('change', '.user-admin-checkbox', function() {
                    $(this).closest('form').submit();
                });
            })
        })
    }, 1000);

</script>
@endsection

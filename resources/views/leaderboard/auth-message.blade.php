@if(!auth()->user())
    <div class="alert alert-info" role="alert" style="font-size: 16px">
    To participate in the prediction game you can <a class="btn btn-primary" href="/redirect">Sign Up Here</a>
    </div>
@else
    
    {{-- @if(!count($selfRank->where('type','predictions')))
        <div class="alert alert-warning" role="alert" style="font-size: 16px">
        It seems you still have not selected or locked your squad <a href="/users-squad" class="btn btn-warning">Click here for to create your squad</a>
        </div>
    @endif --}}
@endif
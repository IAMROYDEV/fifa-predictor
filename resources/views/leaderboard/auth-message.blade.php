@if(!auth()->user())
    <div class="alert alert-info" role="alert" style="font-size: 16px">
    To participate in the predicton game you can <a class="btn btn-primary" href="/redirect">Sign Up Here</a>
    </div>
@endif

@if(\Session::has('success'))
<div class="alert alert-icon alert-success" role="alert">
  <i class="fe fe-check mr-2" aria-hidden="true"></i> {{\Session::get('success') }}
</div>
@endif
@if(\Session::has('error'))
<div class="alert alert-icon alert-danger" role="alert">
  <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
  {{\Session::get('error') }}
</div>
@endif
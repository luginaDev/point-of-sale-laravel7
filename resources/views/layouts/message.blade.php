@if (session('success'))
<div class="alert alert alert-fill-primary alert-dismissible fade show" role="alert">
    <strong>{{  session('success') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div> 
@elseif(session('error'))
<div class="alert alert alert-fill-primary  alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div> 
@endif


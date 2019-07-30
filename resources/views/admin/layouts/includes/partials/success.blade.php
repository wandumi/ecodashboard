

@if(session()->has('message'))
<div class="alert alert-dismissable alert-success fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" arial-label="close">&times</button>
        <strong>Success:  </strong>{{ session()->get('message') }}
    </div>
@endif

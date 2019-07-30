
@if(session()->has('error'))
    <div class="alert alert-dismissable alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" arial-label="close"
        style="color:white;">
        <span aria-hidden="true">&times;</button>
        <strong>Deleted :  </strong>{{ session()->get('error') }}
    </div>
@endif

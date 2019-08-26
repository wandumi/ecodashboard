@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Permissions ')

@section('title','Create New Permissions')

@section('breadcrumb1', 'Create')

@section('breadcrumb2', 'View')

@section('headassest')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- Theme style -->
  

@endsection

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-8 mx-auto pt-5">

                <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-right">
                                        <a class="btn btn-primary  " href="{{ route('permissions.index') }}">
                                            <span class="fa fa-long-arrow-alt-left"> Back</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                             @include('admin.layouts.includes.partials.errors')
                             @include('admin.layouts.includes.partials.success')
                        </div>
                        <div class="card-body table-responsive">
                            <form action="" method="POST">

                                {{ csrf_field() }}
        
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"{{ old('name')}}>
                                </div>
        
                                <div class="form-group">
                                    <label for="slug">Description</label>
                                    <input type="email" id="slug" class="form-control" name="email"{{ old('slug')}}>
                                </div>
        
                                </div>
                                <div class="modal-footer">
                               
                                    <button type="submit" class="btn btn-danger btn-block">Create Permission</button>
                                
                                </div>
                            </form>
                               

                        </div>
                    </div>
          <!-- /.card -->

        </div>


      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection

@section('chartsscripts')

    <!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

  })
</script>
      
@endsection
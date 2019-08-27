@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Roles ')

@section('title','Create New Role')

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
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
   <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">

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
                                        <div class="pull-left">
                                            <h2 class="fa fa-key" style="font-weight: bold; font-size:150%;"> Roles & Permissions</h2>
                                        </div>
                                    <div class="pull-right">
                                        <a class="btn btn-danger" href="{{ route('roles.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                             @include('admin.layouts.includes.partials.errors')
                        </div>
                        <div class="card-body table-responsive">

                            <form action="{{ route('roles.store') }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name')}}">
                                </div>
        
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" id="description" class="form-control" name="description" value="{{ old('description')}}">
                                </div>
                                
                                <!-- Permission Box -->
                                <div class="form-group mb-5 pt-3">
                                    <label for="permissions">Permissions</label>
                                    <select class="select2 " multiple="permissions"  data-placeholder="Select Permissions" 
                                            style="width: 100%; color:red;"
                                            name="permissions[]">
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            
                               
                            </div>
                        <!-- /.card -->
                        </div>
                                <div class="modal-footer">
                               
                                    <button type="submit" class="btn btn-danger btn-block" 
                                       style=" font-size:24px;"
                                    >Create Role</button>
                                
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
    

  })
</script>
      
@endsection
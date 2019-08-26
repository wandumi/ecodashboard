@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Users ')

@section('title','Create New User')

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
                                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" name="email"{{ old('email')}}>
                                </div>
        
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="select2 " multiple="roles"  data-placeholder="Select a State" style="width: 100%; color:red;">
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
        
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}">
        
                                    <small id="password" class="text-muted">
                                        Must be 6-20 characters long.
                                    </small>
                                </div>
        
                                <div class="form-group">
                                    <label for="passwoord">Retype - Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password')}}">
        
                                    <small id="password" class="text-muted">
                                        It should match with the Password above.
                                    </small>
                                </div>
        
                                </div>
                                <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary btn-block">Create User</button>
                                {{-- <a href="" onclick="
                                        if(confirm('Are you sure you want to add a New User?')){
                                            event.preventDefault();
                                            document.getElementById('add-{{ $user->id }}').submit();
                                        }else{
                                            event.preventDefault();
                                        }">
                                        <span class="btn btn-success">Add User</span>
                                    </a> --}}
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
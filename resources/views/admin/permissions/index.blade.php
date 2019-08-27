@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Permissions ')

@section('title','Permission ')

@section('breadcrumb1', 'Permissions')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-8 col-md-8 mx-auto pt-5">

                    <div class="card">
                            <div class="card-header">
                                <div class="col-md">
                                    <div class="pull-left">
                                        <h2 class="fa fa-key" style="font-weight: bold; font-size: 24px;"><span>&nbsp;</span> Permissions</h2>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="pull-right">
                                        <!-- Button trigger modal -->
                                        <a href="{{ route('permissions.create') }}" class="btn btn-danger">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                 @include('admin.layouts.includes.partials.errors')
                                 @include('admin.layouts.includes.partials.success')
                            </div>
                            <div class="card-body table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">Permission Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($permissions as $permission )
                                                    <tr>

                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>{{ $permission->slug }}</td>
                                                        <td>{{ date ('M j, Y', strtotime($permission->created_at)) }}</td>

                                                        <td>
                                                        <a href="" data-target="#roleedit" data-name="{{ $permission->name }}" data-email="{{ $permission->email }}"
                                                                data-type="{{ $permission->type }}" data-password="{{ $permission->password }}"

                                                            data-toggle="modal" class="fa fa-edit btn btn-sm btn-info">
                                                        </a>

                                                            <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id ) }}"
                                                                    method="POST" style="display:none" >
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            </form>

                                                            <a href="" onclick="
                                                                if(confirm('Are you sure you want to delete this?')){
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $permission->id }}').submit();
                                                                }else{
                                                                    event.preventDefault();
                                                                }">

                                                                <span class="fa fa-trash btn btn-sm btn-danger"></span>
                                                            </a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th score="col">Permission Name</th>
                                                <th score="col">Description</th>
                                                <th score="col">Date</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                            </div>
                        </div>
              <!-- /.card -->

            </div>

            <!-- Modal add-->
            <div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                    <form action="{{ route('permissions.store') }}" method="POST">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox">Editor</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox">Editor</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label for=""><input type="checkbox">Editor</label>
                                </div>
                            </div>
                        
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">

                            <small id="password" class="text-muted">
                                Must be 6-20 characters long.
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="passwoord">Retype - Password</label>
                            <input type="password" name="password_confirmation" class="form-control">

                            <small id="password" class="text-muted">
                                It should match with the Password above.
                            </small>
                        </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add role</button>
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
            </div>

            <!-- Modal edit-->
            <div class="modal fade" id="useredit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">

                        <form action="{{ route('permissions.update', $permission->id ) }}}}" method="POST">

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
                                <label for="roles">User Role</label>
                                <select class="form-control" name="type" id="type">
                                    <option selected>Roles</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Author">Author</option>
                                    <option value="Moderator">Moderator</option>
                                    <option value="User">User</option>
                                </select>
                            </div>

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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update User</button>
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
                </div>


            </div>


          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
@endsection




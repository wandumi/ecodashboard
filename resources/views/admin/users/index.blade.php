@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Users ')

@section('headstyles')
    .overlay{

    }

    .overlay:target{

    }
@endsection

@section('title','User Managment ')

@section('breadcrumb1', 'User Managment')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">

                    <div class="card">
                            <div class="card-header">
                                {{-- <div class="col-md">
                                    <p>wandumi</p>
                                </div> --}}
                                <div class="col-md">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#user">
                                        add New <i><span class="fa fa-user"></span></i>
                                    </button>
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
                                                <th score="col">User Name</th>
                                                <th score="col">Email Address</th>
                                                <th score="col">Type of User</th>
                                                <th score="col">Create At</th>
                                                <th score="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($users as $user )
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->type }}</td>
                                                    <td>{{ $user->created_at }}</td>

                                                    <td>
                                                    <a href="" data-target="#useredit" data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                                            data-type="{{ $user->type }}" data-password="{{ $user->password }}"

                                                        data-toggle="modal" class="fa fa-edit btn btn-sm btn-primary">
                                                    </a>

                                                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id ) }}"
                                                                method="POST" style="display:none" >
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a href="" onclick="
                                                            if(confirm('Are you sure you want to delete this?')){
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $user->id }}').submit();
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
                                                <th score="col">User Name</th>
                                                <th score="col">Email Address</th>
                                                <th score="col">Type of User</th>
                                                <th score="col">Password</th>
                                                <th score="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                            </div>
                        </div>
              <!-- /.card -->

            </div>

            <!-- Modal add-->
            <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                    <form action="{{ route('users.store') }}" method="POST">

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
                        <button type="submit" class="btn btn-primary">Add User</button>
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

                        <form action="{{ route('users.update', $user->id ) }}}}" method="POST">

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

@section('chartsscripts')
    <script>

        $('#useredit').on('show.bs.modal', function (event) {

            var button   = $(event.relatedTarget)
            var myUser   = button.data('name')
            var email    = button.data('email')
            var type     = button.data('type')
            var password = button.data('password')


            var modal = $(this)//instance of the window open

            //varaiables from the database
            modal.find('.modal-body #name').val(myUser)
            modal.find('.modal-body #email').val(email)
            modal.find('.modal-body #type').val(type)
            modal.find('.modal-body #password').val(password)
        })

    </script>
@endsection



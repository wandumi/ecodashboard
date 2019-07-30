@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Unclaimed Benefit Create ')

@section('title','Unclaimed Benefit Create ')

@section('breadcrumb1', 'Unclaimed Benefit Create')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="pull left">
                            <!-- Button trigger modal -->
                            <a href="{{ route('unclaimed.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="card-body table-responsive" class="pb-5">

                            <form action="{{ route('unclaimed.store') }}" method="POST" class="">

                                    {{ csrf_field() }}

                                    <div class="row">


                                                <div class="col-md">

                                                        <div class="form-group">
                                                            <label for="industry_number">Industry Number</label>
                                                            <input type="number" name="industry_number" class="form-control">
                                                            {{-- {{ $errors->first('industry_number') }} --}}
                                                            @if ($errors->has('industry_number'))
                                                                <span class="invalid-feedback alert-danger" role="alert">
                                                                    <strong>{{ $errors->first('industry_number') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="id_number">ID Number</label>
                                                            <input type="number" name="id_number" class="form-control">
                                                            {{ $errors->first('id_number') }}
                                                            @if ($errors->has('id_number'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('id_number') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Current Employer</label>
                                                            <input type="text" name="current_employer" class="form-control">
                                                            {{ $errors->first('current_employer') }}
                                                            @if ($errors->has('current_employer'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('current_employer') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Previous Employer</label>
                                                            <input type="text" name="previous_employer" class="form-control">
                                                            {{ $errors->first('previous_employer') }}
                                                            @if ($errors->has('previous_employer'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('previous_employer') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Hear</label>
                                                            <input type="text" name="hear" class="form-control">
                                                            {{ $errors->first('hear') }}
                                                            @if ($errors->has('hear'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('hear') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <input type="number" name="status" class="form-control">
                                                            {{ $errors->first('status') }}
                                                            @if ($errors->has('status'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('status') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Physical Address</label>
                                                            <textarea name="address" class="form-control"></textarea>
                                                        </div>


                                                </div>


                                                <div class="col-md">

                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Maiden Name</label>
                                                            <input type="text" name="maiden_name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Surname</label>
                                                            <input type="text" name="surname" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="email" name="email_address" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input type="number" name="contact_number" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date Of Birth</label>
                                                            <input type="date" name="date_birth" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" name="country" class="form-control">
                                                        </div>

                                                </div>

                                                {{-- <div class='col-md-12'>



                                                    <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" name="country" class="form-control">
                                                        </div>

                                                </div> --}}

                                        </div>


                                        </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary form-control">Save changes</button>
                                        </div>

                                </form>


                    </div>
                </div>

            </div>
            <!-- /.card -->

          </div>




          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      {{-- @if (count($errors) > 0)
        <script>
            $( document ).ready(function() {
                $('#viewmore').modal('show');
            });
        </script> --}}
            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="viewmore">

                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Unclaimed</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                    </div>
                </div>
            </div>

       {{-- @endif --}}
@endsection




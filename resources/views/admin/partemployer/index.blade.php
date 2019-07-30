@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Part Employer  ')

@section('title','Part Employer')

@section('breadcrumb1', 'Part Employer')

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
                            <a href="{{ route('partemployer.create') }}" class="btn btn-primary">
                                Add New
                            </a>
                        </div>
                    </div>
                    <div>
                         @if(session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <strong>Success  </strong>{{ session()->get('message') }}
                            </div>
                         @endif
                    </div>
                    <div class="card-body table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th score="col">Company Name</th>
                                        <th score="col">Service</th>
                                        <th score="col">Address</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Phone Number</th>
                                        <th score="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                        {{-- @foreach ($Webusers as $Webuser )
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $webuser->name }}</td>
                                            <td>{{ $webuser->email }}</td>
                                            <td>{{ $webuser->phone_number }}</td>
                                            <td>{{ $webuser->subject }}</td>
                                            <td>{{ $webuser->message }}</td>

                                            <td>
                                                <a href="#user-edit" class="fa fa-eye btn btn-sm btn-primary"></a>

                                                <form id="delete-form-{{ $webuser->id }}" action="{{ route('unclaimed.destroy', $webuser->id ) }}"
                                                        method="POST" style="display:none" >
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>

                                                <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $webuser->id }}').submit();
                                                    }else{
                                                        event.preventDefault();
                                                    }">

                                                    <span class="fa fa-trash btn btn-sm btn-danger"></span>
                                                </a>

                                            </td>

                                        </tr>
                                        @endforeach --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th score="col">Company Name</th>
                                        <th score="col">Service</th>
                                        <th score="col">Address</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Phone Number</th>
                                        <th score="col">Action</th>
                                    </tr>
                                </tfoot>
                            </table>

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

@endsection

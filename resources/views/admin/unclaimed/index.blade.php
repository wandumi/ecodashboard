@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Unclaimed Benefit ')



@section('title','Unclaimed Benefit ')

@section('breadcrumb1', 'Unclaimed Benefit')

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
                            <a href="{{ route('unclaimed.create') }}" class="btn btn-primary">
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
                                        <th score="col">Industry_number</th>
                                        <th score="col">ID Number</th>
                                        <th score="col">First Name</th>
                                        <th score="col">Surname</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Current Employer</th>
                                        <th score="col">Contact Number</th>
                                        <th score="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($unclaimed as $claimed )
                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $claimed->industry_number }}</td>
                                            <td>{{ $claimed->id_number }}</td>
                                            <td>{{ $claimed->first_name }}</td>
                                            <td>{{ $claimed->surname }}</td>
                                            <td>{{ $claimed->email_address }}</td>
                                            <td>{{ $claimed->current_employer }}</td>
                                            <td>{{ $claimed->contact_number }}</td>
                                            <td>
                                                <a href="#user-edit" class="fa fa-eye btn btn-sm btn-primary"></a>

                                                <form id="delete-form-{{ $claimed->id }}" action="{{ route('unclaimed.destroy', $claimed->id ) }}"
                                                        method="POST" style="display:none" >
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>

                                                <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $claimed->id }}').submit();
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
                                        <th score="col">Industry_number</th>
                                        <th score="col">ID Number</th>
                                        <th score="col">First Name</th>
                                        <th score="col">Surname</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Current Employer</th>
                                        <th score="col">Contact Number</th>
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




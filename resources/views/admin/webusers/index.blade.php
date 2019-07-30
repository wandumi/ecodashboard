@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Webusers  ')



@section('title','Webusers ')

@section('breadcrumb1', 'Webusers')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        {{-- <div class="pull left">
                            <!-- Button trigger modal -->
                            <a href="{{ route('webusers.create') }}" class="btn btn-primary">
                                Add New
                            </a>
                        </div> --}}
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
                                        <th score="col">Name</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Phone Number</th>
                                        <th score="col">Subject</th>
                                        <th score="col">Messages</th>
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
                                        <th score="col">Name</th>
                                        <th score="col">Email Address</th>
                                        <th score="col">Phone Number</th>
                                        <th score="col">Subject</th>
                                        <th score="col">Messages</th>
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

      <!--This is the map render code -->
      <script>

        const mymap = L.map('mine').setView([0,0], 5);
        // const langlong = L.marker([0, 0]).addTo(mymap);

        // saying this  tiles are comming from open sorce
        const attribution = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

        //The create the tile of the map
        const tiles = L.tileLayer (tileUrl, { attribution });
        //add to the page
        tiles.addTo(mymap);

        const api_url = 'http://ecodashboard.test/livechart/map';

        async function getCordinates () {

            const response = await fetch(api_url);

            //Turn the data from the string to JSON
            const data = await response.json();

            const longitude_data = [];
            const latitude_data = [];

            for (i = 0; i < 1000; i++) {

                latitude_data.push(data[i].latitude);
                longitude_data.push(data[i].longitude);

                L.marker( [
                    parseFloat(latitude_data[i]),
                    parseFloat(longitude_data[i])
                ]).addTo(mymap);

            }


            // const  { latitude, longitude } = data;
            // console.log(data);


            // langlong.setLatLng([latitude, longitude]);

            // document.getElementById('result').textContent = latitude;
            // document.getElementById('lon').textContent = longitude;

        }

    getCordinates();
</script>

@endsection

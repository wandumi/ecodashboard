<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/mineworkers.png') }}"
            height="160"
            width="130"
            alt="Mine Workers"
            {{-- class="brand-image img-circle elevation-3" --}}
            style=""
            class="img-fluid mx-auto d-block"
                   >

             
        {{-- <span class="brand-text font-weight-light">
            mwpf
        </span>  --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/boxed-bg.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
                {{-- {{ auth::user()->name }} --}}
        <a href="#" class="d-block">{{ auth::user()->name ?? 'Anonymous' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open ">
          <a href="{{ url('home') }}" class="nav-link {{ setActive('home', 'active') }}">

                <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>

            </a>

          </li>
          

        @can('isSuperadmin','isAdmin')

            <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link {{ setActive('websitesa', 'active') }}">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Website SA
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <li class="nav-item">

                                <a href="{{ url('websitesa') }}" class="nav-link {{ setActive('websitesa', 'active') }} ">
                                    <i class="fa fa-line-chart nav-icon"></i>
                                    <p>Website Visits Reports</p>
                                </a>

                            </li>

                            <li class="nav-item">

                                <a href="{{ url('social') }}" class="nav-link {{ setActive('social', 'active') }} ">
                                    <i class="fa fa-line-chart nav-icon"></i>
                                    <p>Social Media Reports</p>
                                </a>

                            </li>
                            
                        </li>

                    </ul>

            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    Website MZ
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">

                            <a href="{{ url('analytics') }}" class="nav-link">
                                <i class="fa fa-line-chart nav-icon"></i>
                                <p>Website Visits View</p>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a href=" {{ route('analytics.create') }}" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>Web Visits Graphs</p>
                            </a>
                        </li> --}}
                </ul>

            </li>
            <li class="nav-item has-treeview">
                    <a href="{{ url('unclaimed')}}" class="nav-link {{ setActive('unclaimed', 'active') }}">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Unclaimed
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                    </ul>

                </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    Supply Chain
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">

                            <a href="{{ url('analytics') }}" class="nav-link">
                                <i class="fa fa-line-chart nav-icon"></i>
                                <p>Website Visits View</p>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a href=" {{ route('analytics.create') }}" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>Web Visits Graphs</p>
                            </a>
                        </li> --}}
                </ul>

            </li>
            <li class="nav-item has-treeview">
                <a href="" class="nav-link {{ setActive('cotrak', 'active') }}">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    Cotrak
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                    <ul class="nav nav-treeview">
                        <a href="{{ url('cotrak') }}" class="nav-link {{ setActive('cotrak', 'active') }}">
                            <i class="fa fa-line-chart nav-icon"></i>
                            <p>Reports</p>
                        </a>

                    </li>
                    {{-- <li class="nav-item">

                        <a href=" {{ route('analytics.create') }}" class="nav-link">
                            <i class="fa fa-pie-chart nav-icon"></i>
                            <p>Web Visits Graphs</p>
                        </a>
                    </li> --}}
                </ul>

            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    Mobile App
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">

                            <a href="{{ url('analytics') }}" class="nav-link">
                                <i class="fa fa-line-chart nav-icon"></i>
                                <p>Website Visits View</p>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a href=" {{ route('analytics.create') }}" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>Web Visits Graphs</p>
                            </a>
                        </li> --}}
                </ul>

            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    Compliant
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">

                            <a href="{{ url('analytics') }}" class="nav-link">
                                <i class="fa fa-line-chart nav-icon"></i>
                                <p>Website Visits View</p>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a href=" {{ route('analytics.create') }}" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>Web Visits Graphs</p>
                            </a>
                        </li> --}}
            </ul>

            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-th"></i>
                    <p>
                    RAC
                    <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">

                            <a href="{{ url('analytics') }}" class="nav-link">
                                <i class="fa fa-line-chart nav-icon"></i>
                                <p>Website Visits View</p>
                            </a>

                        </li>
                        <li class="nav-item">

                            <a href=" {{ route('analytics.create') }}" class="nav-link">
                                <i class="fa fa-pie-chart nav-icon"></i>
                                <p>Web Visits Graphs</p>
                            </a>
                        </li> --}}
            </ul>

            </li>


            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link {{ setActive('users', 'active') }}">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>
                        Managment
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                       
                        <li class="nav-item">

                            <a href=" {{ url('users') }}" class="nav-link {{ setActive('users', 'active') }} ">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Users</p>
                            </a>
        
                        </li>

                        <li class="nav-item">

                            <a href=" {{ url('roles') }}" class="nav-link {{ setActive('users', 'active') }} ">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Roles & Permissions</p>
                            </a>
        
                        </li>

                </ul>

        </li>


        @endcan

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
          </li>

          <li class="nav-item" style="padding-bottom: 400px;">
                <a class="nav-link" href="{{ route('logout') }}"
                            onclick="
                        if(confirm('Are you sure you want to Logout?')){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        }else{
                            event.preventDefault();
                        }
                            ">
                    <i class="nav-icon fa fa-power-off"></i>
                    <p>
                        Logout
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

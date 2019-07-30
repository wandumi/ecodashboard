  <!-- top of page  -->
  @include('admin.layouts.includes.topheader')
  <!-- top of the page -->

  <!-- Navbar -->
  @include('admin.layouts.includes.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.includes.aside')
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     @include('admin.layouts.includes.breadcrumb')
    <!-- /.content-header -->


    <!-- main content -->
    {{-- @include('admin.layouts.includes.main') --}}
    <!-- end of the section -->
    <!-- Main content -->
    <section class="content container-fluid">

        @include('admin.layouts.includes.navbarinside')
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')

         <!-- route outlet -->
         <!-- component matched by the route will render here -->
        <router-view></router-view>


    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- footer page -->
  @include('admin.layouts.includes.footer')
  <!-- footer page -->

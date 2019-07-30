
<nav class=" navbar navbar-expand bg-danger navbar-light border-bottom mb-3 ">

    <!-- Left navbar links -->
    <ul class="navbar-nav nav-filter nav-pills ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('home') }}" class="nav-link {{ setActive('home', 'active') }}">Dashboard</a>
      </li>

      @can('isSuperadmin','isAdmin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href=" {{ url('websitesa') }} " class="nav-link {{ setActive('websitesa', 'active') }}">Website SA</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Website MZ</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Supply Chain</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Cotrak</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Mobile App</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Complaint</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">RAC</a>
      </li>

      @endcan






    </ul>
</nav>

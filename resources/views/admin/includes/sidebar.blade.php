<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset ('admin/assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">XChangeMoney</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset ('admin/assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Task -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Currency
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.currency') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Create Currency</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.currency.show') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Show Currencies</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Task -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Contacts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.contacts') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Create Contacts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.contacts.all') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Show Contacts</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- rate -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Rates
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.rate') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Create Rates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.rate.index') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Show Rates</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.transaction') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Trasactions
            </p>
          </a>
        </li>
        <!-- End Package -->
        <div class="border mx-3 py-2 text-center">
          <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
            @csrf
          </form>
          <a href="" onclick="handleLogout(event)">Logout</a>
        </div>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

@section('custom-js')
    <script>
      function handleLogout(event) {
      event.preventDefault(); 
      document.getElementById('logout-form').submit();
     }
    </script>
@endsection
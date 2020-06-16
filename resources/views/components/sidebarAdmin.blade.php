<!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #000000;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/adminHome') }}">

      <div class="sidebar-brand-text mx-3">Admin</div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
      <li class="nav-item">

        <a class="nav-link" href="{{ url('/adminHome') }}">

          <i class="fas fa-fw fa-tachometer-alt"></i>

          <span>Dashboard</span>

        </a>

      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">

          Main Content

        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">

          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

            <i class="fas fa-fw fa-shopping-basket"></i>

            <span>Products</span>

          </a>

          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

              <h6 class="collapse-header">Products</h6>

              <a class="collapse-item" href="{{ url('/adminProducts') }}">Product</a>

              <a class="collapse-item" href="{{ url('/adminProductsCategory') }}">Product Category</a>

            </div>

          </div>

        </li>

        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ url('/adminCouriers') }}">

              <i class="fas fa-fw fa-car"></i>

              <span>Couriers</span>

            </a>

          </li>

          <li class="nav-item">

            <a class="nav-link collapsed" href="{{ url('/adminTransactions') }}">

                <i class="fas fa-fw fa-table"></i>

              <span>Transactions</span>

            </a>

          </li>

        <!-- Divider -->

        {{-- <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">

          Addons

        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">

          <a class="nav-link" href="{{ url('/adminAddons') }}">

            <i class="fas fa-fw fa-user"></i>

            <span>Administrator</span>

          </a>

        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">

          <a class="nav-link" href="#">

            <i class="fas fa-fw fa-table"></i>

            <span>Tables</span>

          </a>

        </li>

        <!-- Divider -->

        <hr class="sidebar-divider d-none d-md-block"> --}}

  </ul>

  <!-- End of Sidebar -->

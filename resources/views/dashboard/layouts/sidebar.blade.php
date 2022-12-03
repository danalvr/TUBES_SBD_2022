<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SI TOKO BUKU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Daniel Alvaro</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">Supplier</li>
          <li class="nav-item">
            <a href="book-stock" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book Stock
              </p>
            </a>
          </li>
          <li class="nav-header">Cashier</li>
          <li class="nav-item">
            <a href="transaction" class="nav-link">
                <i class="nav-icon fas fa-money-check"></i>
              <p>
                Transaction
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <form action="/logout" method="post" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                <button type="submit" class="bg-transparent border-0" style="color: #A7ACB4">Logout</button>
              </p>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
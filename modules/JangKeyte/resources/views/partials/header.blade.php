<header class="text-bg-dark">
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">TOPCOM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="/">TOPCOM</a></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home"></i> Trang chủ</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" href="{!! route('customer') !!}"><i class="fa fa-user-group"></i> Khách hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{!! route('client') !!}"><i class="fa fa-users"></i> Khách hàng tiềm năng</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> Người dùng
                </a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->can('browse-user'))
                    <li><a class="dropdown-item" href="{!! route('user') !!}"><i class="fa-solid fa-id-badge"></i> Danh sách Người dùng</a></li>
                  @endif
                  <li><a class="dropdown-item" href="{!! route('user.detail', auth()->user()->id) !!}"><i class="fa fa-user-gear"></i> Thông tin tài khoản</a></li>
                  <li><a class="dropdown-item" href="{!! route('user.detail', auth()->user()->id) !!}"><i class="fa fa-user-tie"></i> Thông tin cá nhân</a></li>
                  <li><a class="dropdown-item" href="{!! route('user.update', auth()->user()->id) !!}"><i class="fa fa-key"></i> Đổi mật khẩu</a></li>
                  <li><a class="dropdown-item" href="{!! route('user.update', auth()->user()->id) !!}"><i class="fa fa-user-pen"></i> Cập nhật thông tin cá nhân</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="{!! route('user.logout') !!}"><i class="fa fa-right-to-bracket"></i> Đăng xuất</a></li>
                </ul>
              </li>
              @endauth
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><i class="fa fa-magnifying-glass"></i></button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
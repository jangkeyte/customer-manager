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
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">TOPCOM</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{!! route('customer') !!}">Khách hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{!! route('client') !!}">Khách hàng tiềm năng</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Người dùng
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{!! route('user') !!}">Danh sách Người dùng</a></li>
                  <li><a class="dropdown-item" href="#">Thông tin</a></li>
                  <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('frontend') }}/images/logo.png" alt="" />
      </a>
      <button
        class="navbar-toggler navbar-toggler-right"
        type="button"
        data-toggle="collapse"
        data-target="#navb"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav ml-auto mr-3">
          <li class="nav-item mx-md-2">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#">Paket Travel</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
            >
              Services
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a>
            </div>
          </li>
          <li class="nav-item mx-md-2">
            <a class="nav-link" href="#">Testimonial</a>
          </li>
        </ul>

       @guest
            <!-- Mobile button -->
        <form class="form-inline d-sm-block d-md-none">
          <a href="{{ route('login') }}" class="d-flex align-items-center btn btn-login my-2 my-sm-0">
            Masuk
          </a>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <a href="{{ route('login') }}" class="d-flex align-items-center btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
            Masuk
          </a>
        </form>
       @endguest

       @auth
            <!-- Mobile button -->
        <form class="form-inline d-sm-block d-md-none" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-login my-2 my-sm-0">
            Logout
          </button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
            Logout
          </button>
        </form>
       @endauth
      </div>
    </nav>
  </div>
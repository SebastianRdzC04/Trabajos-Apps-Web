<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <style>
        .img {
            width: 160px;
            height: 60px;
        }


    </style>


    <header>
    <div class="head px-3 py-2 text-bg-secondary border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="assets/foto1.png" alt="No cargo loco" class="img d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
                Home
              </a>
            </li>
            <li>
              <a href="{{route('home')}}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
                Inicio
              </a>
            </li>
            <li>
              <a href="{{route('addPersona')}}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
                Personas
              </a>
            </li>
            <li>
              <a href="{{route('addUser')}}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"></use></svg>
                Usuarios
              </a>
            </li>
            <li>
              <a href="{{route('addDireccion')}}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"></use></svg>
                Direcciones
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end d-flex align-items-center">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </header>
    </header>
    <main>
        @yield('main')
    </main>
    <footer>
        @yield('footer')
    </footer>
    @yield('scripts')
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestion des visiteur</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/uploadImage.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>

    </style>
</head>

<body>

    @guest

        <header class="navbar navbar-dark fixed-top bg-light flex-md-nowrap p-0 shadow row">
            <div class="col-md-6 col-lg-4 mb-0 py-0">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('/img/Logo - Copy.png') }}" class="img-fluid px-2 rounded">
                </a>
            </div>
            <div class="col-md-6 col-lg-8 mx-5 py-0 px-3">

                <a href="{{ route('home') }}"
                    class="col-md-6 col-lg-8 my-2 py-0 px-4 text-decoration-none text-dark hover-overlay">
                    HOME
                </a>
                <a href="{{ route('about') }}"
                    class="col-md-6 col-lg-8 my-2 py-0 px-4 text-decoration-none text-dark hover-overlay">
                    ABOUT US
                </a>
                <a href="{{ route('login') }}"
                    class="col-md-6 col-lg-8 my-2 py-0 px-4 text-decoration-none text-dark hover-overlay">
                    ESPACE ADMIN
                </a>
                <a href="{{ route('login_respo') }}"
                    class="col-md-6 col-lg-8 my-2 py-0 px-4 text-decoration-none text-dark hover-overlay">
                    ESPACE RESPONSABLE
                </a>
                <a href="{{ route('login_recep') }}"
                    class="col-md-6 col-lg-8 my-2 py-0 px-4 text-decoration-none text-dark hover-overlay">
                    ESPACE ACCEUIL
                </a>

            </div>

        </header>

        @yield('content')
    @else
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">

        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

        <header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">


            <a href="/dashboard">
                <img src="{{ asset('/img/Logoo.png') }}" class="img-fluid rounded">
            </a>

            {{-- <form class="position-absolute mx-5 px-5 d-sm-inline-block"> --}}
            {{-- <form class="position-absolute mx-5 px-5 d-sm-inline-block" method="POST" action="/search">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" id="datatable-search-input"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-success">search</button>
                </div>
                <div id="datatable">
                </div>
            </form>
 --}}





            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3 text-dark " href="#">Bienvenue, {{ Auth::user()->name }} , Espace :
                        <b><u>{{ Auth::user()->type }}</u></b></a>
                </div>
            </div>
            <button class="navbar-toggler {{-- position-absolute --}} d-md-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </header>

        <div class="container-fluid my-10">
            <div class="row">
                <nav id="sidebarMenu" class="navbar-dark col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <h3 class="mt-4 pt-2">CCIS</h3>
                    <div class="position-sticky pt-4 px-3">
                        <ul class="nav flex-column my-1">

                            <li>
                                <form method="POST" action="{{ route('img') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="profile-pic">
                                        <label class="-label" for="file">
                                            <span class="glyphicon glyphicon-camera"></span>
                                            <span>Change Image</span>
                                        </label>
                                        @if (Auth::user()->profile_image)
                                            <input name="photo" id="file" type="file" oninput="loadFile(event)"
                                                onchange="savePhoto()" />
                                            <img src="{{ asset('imgs/' . Auth::user()->profile_image) }}" id="output"
                                                width="200" />
                                        @else
                                            <input name="photo" id="file" type="file" oninput="loadFile(event)"
                                                onchange="savePhoto()" />
                                            <img src="{{ asset('img/images.jpg') }}" id="output" width="200" />
                                        @endif
                                    </div>
                                </form>




                            </li>

                            <li class="nav-item my-2">
                                <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"
                                    aria-current="page" href="/dashboard">
                                    <i class="bi bi-houses"></i>
                                    Tableau de board
                                </a>
                            </li>
                            @if (Auth::user()->type == 'Admin')
                                <li class="nav-item my-2">
                                    <a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('profile') }}">
                                        <i class="bi bi-pencil-square"></i>
                                        Edite Profil
                                    </a>
                                </li>


                                <li class="nav-item my-2">
                                    <a class="nav-link {{ Request::segment(1) == 'sub_user' ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('sub_user') }}">
                                        <i class="bi bi-people-fill"></i>
                                        Ajoute Utilisateurs
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item my-2">
                                <a class="nav-link {{ Request::segment(1) == 'rechercher_visiteur' ? 'active' : '' }}"
                                    href="{{ route('recherche') }}">
                                    <i class="bi bi-search"></i>
                                    Recherche visite
                                </a>
                            </li>

                            {{-- @if (Auth::user()->type == 'Responsable')

          <li class="nav-item my-2">
            <a class="nav-link {{ Request::segment(1) == 'visitor' ? 'active' : ''}}"
                href="{{ route('visitors.index') }}">
                <i class="bi bi-person"></i>
                Visiteur
            </a>
          </li>
          @endif --}}


                            @if (Auth::user()->type == 'Acceuil')
                                <li class="nav-item my-2">
                                    <a class="nav-link {{ Request::segment(1) == 'visiteur' ? 'active' : '' }}"
                                        href="{{ url('visiteur') }}">
                                        <i class="bi bi-person-plus"></i>
                                        Ajoute visit
                                    </a>

                                </li>
                            @endif

                            <li class="nav-item my-2">
                                <a href="{{ route('logout') }}" class="nav-link">
                                    <i class="bi bi-box-arrow-left"></i>
                                    Se Déconnecter
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    @yield('content')

                </main>

            </div>
        </div>



    @endguest


    {{-- <div class="container-fluid my-10">
  <div class="row">

    <!-- sidebar code here -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Dashboard</h1>

      </div>

      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>John Doe</td>
              <td>john.doe@example.com</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jane Smith</td>
              <td>jane.smith@example.com</td>
              <td>User</td>
            </tr>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script> --}}





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function savePhoto() {
            const file = document.getElementById("file").files[0];
            const formData = new FormData();
            formData.append("photo", file);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('img') }}");
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
            xhr.onload = function() {
                if (xhr.status === 200 && xhr.responseText) {
                    console.log(xhr.responseText);
                    const imgUrl = JSON.parse(xhr.responseText).imgUrl;
                    const imgPreview = document.getElementById("output");
                    imgPreview.src = imgUrl;
                }
            };
            xhr.send(formData);
        }
    </script>
</body>

</html>

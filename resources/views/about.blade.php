@extends('dashboard')

@section('content')

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>About us</title>
        <link rel="stylesheet" href="{% static 'about.css' %}" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="icon" href="{% static 'PICO-LOGO-SHORT.png' %}" type="image/gif">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="company my-5">
            <div class="img my-5">
                <img src="{{ asset('img/about-team.jpg') }}" alt="" />
            </div>
            <div class="company-info">
                <span>CCIS <span class="our">SOUSS MASSA</span></span>
                <p>
                    Les chambres de commerce d'industrie et de Services (CCIS) sont,
                    au Maroc comme dans d'autres pays, des organismes chargés de représenter les intérêts des entreprises
                    commerciales, industrielles et de services dans leurs circonscription et de leur apporter certains
                    services.
                    Ce sont des établissements publics, leur organisation actuelle a été fixée par le Dahir portant loi
                    n° 1-77-42 du 7 Safar 1397 (28 janvier 1977) formant statut des Chambres de commerce d'industrie
                    et de services, comme il a été promulgué.
                </p>
            </div>
        </div>
        <div class="team"><span>NOTRE ÉQUIPE</span></div>
        <div class="container">
            @foreach ($teamMembers as $teamMember)
                <div class="card">
                    <div class="card-image loading"><img src="{{ asset('imgs/' . $teamMember->profile_image) }}"
                            alt="" /></div>
                    <div class="card-info">
                        <h3 class="card-title loading"><span>Mr (s) <span class="yellow-surname">{{ $teamMember->name }}
                                </span></span>
                        </h3>
                        <p class="card-description loading">
                            <span class="personal-info">
                                <span class="info">{{ $teamMember->type }}</span> <br>
                                <u> <b>Departement:</b></u> {{ $teamMember->departement }} <u><b>Service:</b></u>
                                {{ $teamMember->service }}<br>
                                Email: <a href="mailto:'{{ $teamMember->email }}'">{{ $teamMember->email }}</a>
                            </span>
                        </p>

                    </div>
                </div>
            @endforeach


            {{-- <div class="card">
                    <div class="card-info">
                        <img class="img-fluid" src="{{ asset('imgs/' . $teamMember->profile_image) }}" alt="..." />
                        <h4 class="card-title loading"><span class="info">{{ $teamMember->name }} </span></h4>
                        <p class="card-description loading">
                            <span class="personal-info">
                                <h4>Type: <span class="info">{{ $teamMember->type }}</span></h4> <br>
                                <h4>Departement: <span class="info">{{ $teamMember->departement }}</span> </h4> <br>
                                <h4>Service: <span class="info">{{ $teamMember->service }}</span> </h4><br>
                                <h4> Email: <a href="mailto:'{{ $teamMember->email }}">{{ $teamMember->email }}</a></h4>
                            </span>
                        </p> --}}
            {{-- <div class="card-mediaIcons">
            <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/yashfalke77/" class="loading" target="on_blank"><i class="fab fa-instagram"></i></a>
          </div> --}}
            {{-- </div>
                </div> --}}
        </div>

        <!-- footer -->

        <footer class="text-center text-lg-start bg-light text-muted mt-5">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a target="on_blank" href="https://www.facebook.com/ccissm/?locale=fr_FR" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a target="on_blank" href="https://twitter.com/agadirccis" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="mailto:'ccisa@ccis-agadir.com'" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a target="on_blank" href="https://instagram.com/ccissoussmassa?igshid=YmMyMTA2M2Y="
                        class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="text-center text-md-start ">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>Company name
                            </h6>
                            <p>
                                Chambre de Commerce d'Industrie et de Services
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <a href="{{ route('home') }}" class="text-reset text-decoration-none">Home</a>
                            </p>
                            <p>
                                <a href="{{ route('about') }}" class="text-reset text-decoration-none">About Us</a>
                            </p>
                            <p>
                                <a target="on_blank" href="http://www.ccis-agadir.com/"
                                    class="text-reset text-decoration-none">Site Web</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> Av. Hassan II, Agadir 80000</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                ccisa@ccis-agadir.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +212 5288-47124</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.05);">
                {{-- © 2021 Copyright: --}}
                All rights Reserved &copy;
                <a class="text-reset fw-bold" href="http://www.ccis-agadir.com/" target="on_blank">CCIS.com</a>
                <span id="date"></span>
            </div>
            <!-- Copyright -->
        </footer>

        <!-- footer -->

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            const date = getElement('#date');
            const currentYear = new Date().getFullYear();
            date.textContent = currentYear;
        </script>

        </html>
    @endsection

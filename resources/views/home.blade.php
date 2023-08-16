@extends('dashboard')


@section('content')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- ===============================================-->
        <!--    Document Title-->
        <!-- ===============================================-->
        <title> CCIS | Souss Masa</title>


        <!-- ===============================================-->
        <!--    Favicons-->
        <!-- ===============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicons/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
        <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
        <meta name="theme-color" content="#ffffff">


        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" />

    </head>


    <body>

        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main class="main" id="top">


            <section class="py-xxl-10 pb-0" id="home">
                <div class="bg-holder bg-size"
                    style="background-image:url({{ asset('img/gallery/hero-header-bg.png') }});background-position:top center;background-size:cover;">
                </div>
                <!--/.bg-holder-->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5 col-xl-6 col-xxl-7 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
                                src="{{ asset('img/illustrations/hero.png') }}" alt="hero-header" /></div>
                        <div class="col-md-75 col-xl-6 col-xxl-5 text-md-start text-center py-8">
                            <h1 class="fw-normal fs-6 fs-xxl-7">Nous sommes la meilleure
                                chambre de commerce pour les entreprises </h1>
                        </div>
                    </div>
                </div>
                <!-- ============================================-->
                <!-- <section> begin ============================-->

            </section>
            <section class="pt-7 pb-0 my-8">

                <div class="container">
                    <div class="row">
                        <div class="col-6 col-lg mb-5">
                            <div class="text-center"><img src="{{ asset('img/icons/awards.png') }}" alt="..." />
                                <h1 class="text-primary mt-2">{{ $globalVisiteurs->count() }}</h1>
                                <h5 class="text-800">Total Visiteurs</h5>
                            </div>
                        </div>
                        <div class="col-6 col-lg mb-5">
                            <div class="text-center"><img src="{{ asset('img/icons/states.png') }}" alt="..." />
                                <h1 class="text-primary mt-4">{{ $visitsCompleted->count() }}</h1>
                                <h5 class="text-800">Total Visits </h5>
                            </div>
                        </div>
                        <div class="col-6 col-lg mb-5">
                            <div class="text-center"><img src="{{ asset('img/icons/clients.png') }}" alt="..." />
                                <h1 class="text-primary mt-4">{{ $visiteursSatisfied->count() }}</h1>
                                <h5 class="text-800">Visiteurs Satisfied</h5>
                            </div>
                        </div>
                        {{-- <div class="col-6 col-lg mb-5">
            <div class="text-center"><img src="{{asset('img/icons/business.png')}}" alt="..." />
              <h1 class="text-primary mt-4">130M+</h1>
              <h5 class="text-800">Business hours</h5>
            </div>
          </div>
        </div> --}}
                    </div>
                    <!-- end of .container-->

            </section>

            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="py-7 my-9" id="services" container-xl="container-xl">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-5 text-center mb-3">
                            <h5 class="text-danger">Utilisateurs</h5>
                        </div>
                    </div>
                    <div class="row h-100 justify-content-center">
                        <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                            <div class="card h-100 px-lg-5 card-span">
                                <div class="card-body d-flex flex-column justify-content-around">
                                    <div class="text-center pt-5"><img class="img-fluid"
                                            src="{{ asset('img/icons/services-1.png') }}" alt="..." />
                                        <h5 class="my-4">Espace Admin</h5>
                                    </div>
                                    <div class="text-center my-5">
                                        <div class="d-grid">
                                            <a href="{{ route('login') }}" class="btn btn-outline-danger"
                                                type="submit">Log in</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                            <div class="card h-100 px-lg-5 card-span">
                                <div class="card-body d-flex flex-column justify-content-around">
                                    <div class="text-center pt-5"><img class="img-fluid"
                                            src="{{ asset('img/icons/services-2.svg') }}" alt="..." />
                                        <h5 class="my-4">Espace Responsable</h5>
                                    </div>
                                    <div class="text-center my-5">
                                        <div class="d-grid">
                                            <a href="{{ route('login_respo') }}" class="btn btn-outline-danger"
                                                type="submit">Log in</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pt-4 px-md-2 px-lg-3">
                            <div class="card h-100 px-lg-5 card-span">
                                <div class="card-body d-flex flex-column justify-content-around">
                                    <div class="text-center pt-5"><img class="img-fluid"
                                            src="{{ asset('img/icons/services-3.png') }}" alt="..." />
                                        <h5 class="my-4">Espace Acceuil</h5>
                                    </div>
                                    <div class="text-center my-5">
                                        <div class="d-grid">
                                            <a href="{{ route('login') }}" class="btn btn-outline-danger"
                                                type="submit">Log in </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of .container-->

            </section>
            <!-- <section> close ============================-->
            <!-- ============================================-->

            <!-- footer -->

            <footer class="text-center text-lg-start bg-light text-muted mt-9">
                <!-- Section: Social media -->
                <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom ">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Get connected with us on social networks:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a target="on_blank" href="https://www.facebook.com/ccissm/?locale=fr_FR"
                            class="me-4 text-reset">
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
                <section class="py-0 my-0">
                    <div class=" text-center text-md-start mt-5">
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
                                <a href="{{ route('home') }}" class="text-reset">Home</a>
                                </p>
                                <p>
                                    <a href="{{ route('about') }}" class="text-reset">About Us</a>
                                </p>
                                <p>
                                    <a target="on_blank" href="http://www.ccis-agadir.com/" class="text-reset">Site
                                        Web</a>
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
                    <span id="#date-footer"></span>
                </div>
                <!-- Copyright -->
            </footer>

            <!-- footer -->

        </main>

        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="vendors/@popperjs/popper.min.js"></script>
        <script src="vendors/bootstrap/bootstrap.min.js"></script>
        <script src="vendors/is/is.min.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script src="vendors/fontawesome/all.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script>
            const date = document.getElementById('#date-footer');
            const currentYear = new Date().getFullYear();
            console.log(currentYear);
            date.textContent = currentYear;
        </script>

        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800&amp;display=swap"
            rel="stylesheet">
    </body>
@endsection

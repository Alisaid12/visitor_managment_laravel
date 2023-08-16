@extends('dashboard')
@section('content')
    <section class="vh-100"
        style="background: url({{ asset('img/ccissm.jpg') }}); background-repeat: no-repeat; background-size: 1350px 700px;">
        <div class="container h-100">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form action="{{ route('register.custom') }}" method="POST" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                                <input type="text" id="form3Example1c" name="name"
                                                    class="form-control" value="{{ old('name') }}" autofocus />
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" id="form3Example3c" name="email"
                                                    class="form-control" value="{{ old('email') }}" />

                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" id="form3Example4c"
                                                        class="form-control" value="{{ old('password') }}" minlength="6"
                                                        maxlength="20" />
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="togglePassword">
                                                        {{-- <i class="fas fa-eye"></i>
                         --}}

                                                        <i class="bi bi-eye"></i>
                                                </div>

                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <script>
                                            const togglePassword = document.querySelector('#togglePassword');
                                            const password = document.querySelector('#form3Example4c');
                                            togglePassword.addEventListener('click', function(e) {
                                                // toggle the type attribute
                                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                                password.setAttribute('type', type);
                                                // toggle the eye icon
                                                this.querySelector('i').classList.toggle('fa-eye-slash');
                                            });
                                        </script>

                                        {{-- <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="password-field">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" id="password-field" class="form-control" value="{{ old('password') }}" />
                      <button id="show-password-btn" type="button" class="btn btn-secondary">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <script> document.addEventListener('DOMContentLoaded', () => {
                  const passwordField = document.getElementById('password-field');
                  const showPasswordBtn = document.getElementById('show-password-btn');
                  showPasswordBtn.addEventListener('click', () => {
                    if (passwordField.type === 'password') {
                      passwordField.type = 'text';
                      showPasswordBtn.querySelector('i').classList.remove('fa-eye');
                      showPasswordBtn.querySelector('i').classList.add('fa-eye-slash');
                    } else {
                      passwordField.type = 'password';
                      showPasswordBtn.querySelector('i').classList.remove('fa-eye-slash');
                      showPasswordBtn.querySelector('i').classList.add('fa-eye');
                    }
                  });
                });
                </script> --}}


                                        {{-- <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                  <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example4c">Password</label>
                    <input type="password" name="password" id="form3Example4c" class="form-control" value="{{ old('password') }}" />

                    @error('password')
                      <span class="text-danger">{{$message}}</span>
                    @enderror

                  </div>
                </div> --}}

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Departement</label>
                                                <input type="text" name="departement" id="form3Example5c"
                                                    class="form-control" value="{{ old('departement') }}" />

                                                @error('departement')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Service</label>
                                                <input type="text" name="service" id="form3Example6c"
                                                    class="form-control" value="{{ old('service') }}" />

                                                @error('service')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>



                                        <div class="d-flex justify-content-center mx-4 mb-lg-0">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                        <br>
                                        <p class="font-weight-bold">
                                            If you have an account
                                            <a href="{{ route('login') }}">
                                                Login
                                            </a>
                                        </p>

                                    </form>

                                </div>



                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{ asset('/img/draw1.webp') }}" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection













{{-- @extends('dashboard')
@section('content')

<main class="signup-form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        <div class="card">
          <h3 class="card-header text-center">Register User</h3>
          <div class="card-body">
            <form action="{{ route('register.custom') }}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" />
                @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              </div>
              <div class="form-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}"/>
                @error('password')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Sign Up</button>
              </div>
            </form>
            <br>
            <div class="text-center">
                <a href="{{ route('login') }}">
                    Login
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection --}}

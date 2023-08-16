@extends('dashboard')


@section('content')
    <div>
        <h2 class="mt-3">Ajoute Utilisateur</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-center">
                <li class="breadcrumb-item"><a href="/dashboard">Tableau de Board</a></li>
                <li class="breadcrumb-item"><a href="/sub_user">Sous Utilisateur</a></li>
                <li class="breadcrumb-item active">Ajoute Utilisateur</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-center">
            {{-- <div class="col-md-4">
    <div class="card"> --}}

            {{-- <div class="row mt-4  " > --}}
            <div class="col-md-4 col-lg-7">
                <div class="card">
                    <div class="card-header">Ajouter Nouveaux Utilisateur</div>
                    <div class="card-body">
                        <form action="{{ route('sub_user.add_validation') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label><b>Nom Utilisateur</b></label>
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label><b> Email</b></label>
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-4">
            <label><b>Password</b></label>
            <input type="password" name="password" class="form-control"
            placeholder="Password" value="{{ old('password') }}">
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div> --}}

                            <div class="form-group mb-4">
                                <label><b>Password</b></label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}" id="password-field">
                                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <script>
                                const passwordField = document.querySelector('#password-field');
                                const togglePassword = document.querySelector('#toggle-password');

                                togglePassword.addEventListener('click', function(e) {
                                    // toggle the type attribute
                                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordField.setAttribute('type', type);
                                    // toggle the eye icon
                                    this.querySelector('i').classList.toggle('fa-eye');
                                    this.querySelector('i').classList.toggle('fa-eye-slash');
                                });
                            </script>



                            <div class="form-group mb-3">
                                <label><b>Departement</b></label>
                                <input type="text" name="departement" id="departement" class="form-control"
                                    placeholder="Departement" value="{{ old('departement') }}">
                                @error('departement')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Service</b></label>
                                <input type="text" name="service" id="service" class="form-control"
                                    placeholder="Service" value="{{ old('service') }}">
                                @error('service')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="type"><b>Type Utilisateur:</b></label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">-</option>
                                    <option value="Responsable">Responsable</option>
                                    <option value="Acceuil">Acceuil</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group mb-3 text-center">
                                <input type="submit" class="btn btn-primary" value="Ajoute">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    </div>
@endsection

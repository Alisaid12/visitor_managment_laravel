@extends('dashboard')

@section('content')
    <div>
        <h2 class="mt-3  ">Profile</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-center">
                <li class="breadcrumb-item ">
                    <a href="dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">
                    Profile
                </li>
            </ol>
        </nav>
        <div class="row mt-4 justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-4 col-lg-7">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <form action="{{ route('profile.edit_validation') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label><b>User Name</b></label>
                                <input type="text" name="name" class="form-control" placeholder="name"
                                    value="{{ $data->name }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label><b>User Email</b></label>
                                <input type="email" name="email" class="form-control" placeholder="email"
                                    value="{{ $data->email }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-3">
            <label><b>password</b></label>
            <input type="password" name="password" class="form-control"
            placeholder="password"/>
          </div> --}}

                            <div class="form-group mb-3">
                                <label><b>Password</b></label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        id="password-field">
                                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
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
                                <input type="submit" class="btn btn-primary" value="Edit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

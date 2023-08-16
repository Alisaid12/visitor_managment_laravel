@extends('dashboard')


@section('content')

<h2 class="mt-3">Modifier Utilisateur</h2>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard">Tablaux de Board</a></li>
    <li class="breadcrumb-item"><a href="/sub_user">Utilisateur</a></li>
    <li class="breadcrumb-item active">Modifier Utilisateur</li>
  </ol>
</nav>

<div class="d-flex justify-content-center">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">Modifier Utilisateur</div>  
      <div class="card-body">
        <form action="{{ route('sub_user.edit_validation') }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label><b>Nom Utilisateur</b></label>
            <input type="text" name="name" class="form-control"
            placeholder="Name" value="{{ $data->name }}">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label><b> Email</b></label>
            <input type="email" name="email" class="form-control"
            placeholder="Email" value="{{ $data->email }}">
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- <div class="form-group mb-3">
            <label><b>Password</b></label>
            <input type="password" name="password" class="form-control"
            placeholder="Password">
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div> --}}
          <div class="form-outline mb-3">
            <label><b>Password</b></label>
            <div class="input-group">
              <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
                placeholder="Enter password" />
              <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                {{-- <i class="far fa-eye-slash"></i> --}}
                <i class="bi bi-eye"></i>
              </button>
            </div>
            @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
          
          <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#form3Example4');
            togglePassword.addEventListener('click', function (e) {
              // toggle the type attribute
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);
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
            <input type="text" name="service"  id="service" class="form-control"
            placeholder="Service" value="{{ old('service') }}">
            @error('service')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="type">Type Utilisateur:</label>
            <select class="form-control" name="type" id="type">
              <option value="-">-</option>
              <option value="responsable">Responsable</option>
              <option value="acceuil">Acceuil</option>
            </select>
            @error('type')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          

          <div class="form-group mb-3 text-center">
            <input type="hidden" name="hidden_id" value="{{ $data->id }}">
            <input type="submit" class="btn btn-primary " value="Edit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

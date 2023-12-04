<!-- resources/views/login.blade.php -->
{{-- @include('admin.layout.bootstrap'); --}}
<!-- Tambahkan di bagian head -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">


<a class="nav-link" href="{{url('/interface')}}">
    <span>Kembali</span>
</a>

@if(session('error'))
    <div class="w-50 mx-auto alert alert-danger text-center shadow">
        {{ session('error') }}
    </div>
@endif



<div class="card border-radius w-50 mx-auto mt-5 shadow">
    <div class="w-50 mx-auto mt-5" >
        <form action="{{ route('process.login') }}" method="post" class="login-form">
            @csrf
            <h3 class="text-center">Login User</h3>
            <div class="form-group">
                <label for="username" ><i class="fas fa-user"></i> Username:</label>
                <input type="text" name="username" class="form-control border-radius" placeholder="username : satu" required>
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" name="password" class="form-control border-radius " placeholder="password : satu" required>
            </div>

            <p>Don't Have any account? <a href="{{url('/akun/create')}}"> Register</a> </p>

            <button type="submit" class="btn btn-secondary btn-block mx-auto mb-5 border-radius">Login</button>
        </form>
    </div>
</div>

{{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

<style>
    input::placeholder{
       font-size: 14px;
       padding: 2px;
    }

    .border-radius {
        border-radius: 20px;
    }

    body {
        background-color: rgb(149, 151, 149); /* Hijau */
    }

</style>




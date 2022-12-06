@extends('layout')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/regist.css')}}">
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
      <div class="card">
       <img src="assets/img/R.png" alt="" width="70px" class="kot">
     <h2 class="card-title text-center">Register Page</h2>
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="card-body py-md-4">
       <form method="POST" action="/register" class="form-log">
         @csrf
          <div class="form-group 1">
             <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
          <div class="form-group 1">
             <input type="text" class="form-control" name="username" id="name" placeholder="Username">
        </div>
        <div class="form-group 1">
             <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            
                          
   <div class="form-group 1">
     <input type="password" class="form-control" name="password" id="password" placeholder="Password">
   </div>
       <button type="submit" class="btn btn-primary ghost">Create Account</button>
       <a class="coy" href="/">Login</a>
        
       </form>
     </div>
  </div>
</div>
</div>
{{ session('berhasil')}}
</div>
@endsection
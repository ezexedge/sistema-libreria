@extends('plantilla')
@section('content')

<div class="login-box">
    <div class="login-logo">
      <h1>Libreria</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Inicio de sesion</p>
  
      <form action="{{ route('login') }}" method="post">

        @csrf

        
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email"
          value={{old('email')}}
          
          >
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @error('email')
            <br>
            <div class="alert alert-danger">
                Error con el email
            </div>
            @enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
   
      <!-- /.social-auth-links -->
  
  
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection
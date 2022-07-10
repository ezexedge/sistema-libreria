@extends('plantilla');
@section('contenido');

<div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor perfil personal</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form  method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <h2>Nombre:</h2>
                                <input type="text" name="name" value="{{auth()->user()->name}}" class="input-lg">

                                <h2>Documento:</h2>
                                <input type="text" name="documento" value="{{auth()->user()->documento}}" class="input-lg">


                             </div>

                             <div class="col-md-6 col-xs-12">
                                <h2>Email:</h2>
                                <input type="email" name="email" value="{{auth()->user()->email}}" class="input-lg">

                                <h2>Contrasena:</h2>
                                <input type="text" name="passwordN" value="" class="input-lg">
                                <input type="hidden" name="password" value="{{auth()->user()->password}}" class="input-lg">

                                <h2>Foto de perfil</h2>
                                <hr>
                                <input type="file" name="fotoPerfil" >

                                @if(auth()->user()->foto == "")

                                <img src="{{url("storage/defecto.png")}}" width="150px" height="150px"  alt="User Image">
                  
                                @else
                  
                                <img src="{{url('storage/'. auth()->user()->foto)}}" width="150px" height="150px" alt="User Image">
                  
                              @endif

                             </div>
                        </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-lg pull-right ">Guardar</button>
                </div>
            </form>

            </div>
        </section>
</div>

@endsection
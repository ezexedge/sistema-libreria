@extends('plantilla');
@section('contenido');

<div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor genero literarios</h1>
            <br>
            <form method="post">

                @csrf
                <div class="col-md-3 col-xs-12">
                    <input  class="form-control" type="text" name="nombres" id=""
                    required placeholder="Ingrese un nuevo genero"
                    >
                </div>
                <button class="btn btn-primary" type="submit">Agregar</button>
            </form>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                      

                        @foreach($generos as $genero)
                        <div class="row">

                        <form  method="post" action="{{ url('Actualizar-Genero/'.$genero->id) }}">
                            @csrf
                            @method('put')
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="nombres"
                                value="{{ $genero->nombres }}"
                                >
                            </div>

                            <div class="col-md-3">
                                <button class="btn btn-primary">Ver libros</button>
                                <button class="btn btn-success" type="submit">Editar</button>
                                <a href="{{ url('EliminarGenero/'.$genero->id) }}">
                                <button class="btn btn-danger" type="button">Eliminar</button>
                                </a>
                            </div>

                        </form>
                    </div>
                    <br>
                        @endforeach

                </div>
            </div>
        </section>
</div>

@endsection
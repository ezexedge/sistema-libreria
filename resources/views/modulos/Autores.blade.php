@extends('plantilla');
@section('contenido');

<div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de Autores</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <a href="{{ url('Agregar-Autor')}}">
                        <button class="btn btn-primary">Agregar autor</button>
                    </a>
                </div>
            </div>
        </section>
</div>

@endsection
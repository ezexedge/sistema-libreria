@extends('plantilla');
@section('contenido');

<div class="content-wrapper">
        <section class="content-header">
            <h1>Gestor de cliente</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#CrearCliente"
                    >   
                    Crear nuevo cliente
                    </button>
                </div>
                <div class="box-body">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Cliente</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->documento}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>

                                        <a href="{{url('Editar-Cliente/'.$cliente->id)}}">
                                        <button class="btn btn-success">
                                            <i class="fa fa-pencil">

                                            </i>
                                        </button>
                                    </a>
                                        <button class="btn btn-danger EliminarCliente"
                                        Cid="{{ $cliente->id }}"
                                        Cliente="{{$cliente->nombre}}"
                                        >
                                            <i class="fa fa-trash">
                                                
                                            </i>
                                        </button>
                                    </td>


                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </section>
</div>


<div class="modal fade" id="CrearCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombress:</h2>
                            <input type="text" class="form-control input-lg" name="name">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" name="documento">
                        </div>
                        <div class="form-group">
                            <h2>Direccion:</h2>
                            <input type="text" class="form-control input-lg" name="direccion">
                        </div>
                        <div class="form-group">
                            <h2>Telefono:</h2>
                            <input type="text" class="form-control input-lg" name="telefono">
                        </div>
                     
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Crear cliente
                    </button>

                    <button type="button" class="btn btn-danger " data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 



<?php

    $exp = explode('/',$_SERVER['REQUEST_URI']);


?>


@if($exp[3] == 'Editar-Cliente')

<div class="modal fade" id="EditarCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ url('ActualizarC/'.$cli->id )}}">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" name="name" value="{{$cli->nombre}}">
                        </div>
                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" name="documento" value="{{$cli->documento}}">
                        </div>
                        <div class="form-group">
                            <h2>Direccion:</h2>
                            <input type="text" class="form-control input-lg" name="direccion" value="{{$cli->direccion}}">
                        </div>
                        <div class="form-group">
                            <h2>Telefono:</h2>
                            <input type="text" class="form-control input-lg" name="telefono" value="{{$cli->telefono}}">
                        </div>
                     
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Crear cliente
                    </button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 
@endif

@endsection
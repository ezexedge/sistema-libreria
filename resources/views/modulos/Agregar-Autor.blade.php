@extends('plantilla');
@section('contenido');

<div class="content-wrapper">
        <section class="content-header">
            <h1>Agregar Autor</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data">

                            @csrf
                            <h2>Autor:</h2>
                            <input type="text" class="form-control" name="nombre" >

                            <h2>Foto: </h2>
                            <input type="file" class="form-control" name="foto">
                            <h2>Bibliografia: </h2>
                            <textarea name="biografia"  style="width:100%;heigth:400px;"></textarea>
                            <button class="btn  btn-primary" type="submit" >Agregar</button>
                    </form>
                </div>
            </div>
        </section>
</div>

@endsection
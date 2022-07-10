<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;


    //esto se pone para decir que mi tablA SE llama
    //clientes por que si le pongo clientes de entrada
    //lo toma como clientess con doble s
    protected $table = "clientes";



    //habilito los campos para poder modificar
    protected $fillable = [
        'nombre',
        'documento',
        'direccion',
        'telefono',
        'rol',
        'fechaNac',
        'prueba'
    ];

    public $timestamps = false;


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['habitacion', 'nombre', 'apellidos', 'documento', 'descripcion', 'due_date', 'status'];

}

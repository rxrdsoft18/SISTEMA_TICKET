<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  
  
  const NIVEL_IMPORTANCIA_URGENTE='URGENTE';
  const NIVEL_IMPORTANCIA_BAJO='MEDIO BAJO';
  
  protected $fillable=[
    'nombre',
    'descripcion',
    'nivel_importancia',
    'fecha_solicitud'
  ];
}

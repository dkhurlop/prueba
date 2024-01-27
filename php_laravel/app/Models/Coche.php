<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'anio', 'color', 'id_propietario'];

    public function propietario(){
        return $this->belongsTo(Propietario::class, 'id_propietario');
    }
    
}

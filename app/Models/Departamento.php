<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function empleados(){
        return $this->hasMany(Empleado::class);
    }
}

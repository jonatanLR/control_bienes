<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamento;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','dni','departamento_id'];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
    
    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
}
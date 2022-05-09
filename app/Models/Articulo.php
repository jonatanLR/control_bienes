<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\TipoArticulo;
use App\Models\User;
use App\Models\Image;

class Articulo extends Model
{
    use HasFactory;

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function tipoArticulo(){
        return $this->belongsTo(TipoArticulo::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}

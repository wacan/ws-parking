<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
        //funciones para definir y validar el parking de Bicicletas
        public function parkings()
        {
            return $this->belongsToMany(Parking::class)->withTimestamps();
        }
    
        public function asignarParking($parking)
        {
            $this->parkings()->sync($parking, false);
        }
    
        public function tieneParking()
        {
            return $this->parkings->flatten()->pluck('name')->unique();
        }
}

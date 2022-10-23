<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
=======
    //metodo para recibir la foreing key
    public function user()
    {
        return $this->belongsTo(Conductor::class);
    }
>>>>>>> ecd25ad3b605f54d5711b8df6c5378b21db6b859
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    public $table = "clientes"; // Especificar el nombre de la tabla

    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha_nacimiento',
        'foto',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    //metodo para dar la primari key
    public function Conductor(){
        return $this->hasMany(Conductor::class);
    }
}

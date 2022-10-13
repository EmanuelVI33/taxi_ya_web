<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conductor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'ci',
        'ocupado',
        'fotoAntecedente',
        'fotoLicencia',
        'fotoTIC',
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 
        'matricula', 
        'tecnica',
        'equipe', 
        'grau', 
        'tipo_sanguineo', 
        'especializacao', 
        'emissao', 
        'foto',
        'saldo',
        'inventario',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
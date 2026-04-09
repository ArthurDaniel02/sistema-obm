<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Maldicao extends Model

{
    use HasFactory;
    protected $table = 'maldicoes'; 

    protected $fillable = [

        'nome', 'grau', 'descricao', 'efeitos', 'neutralizacao', 'foto'

    ];
}
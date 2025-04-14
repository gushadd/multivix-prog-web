<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nome', 'valor', 'imagem', 'descricao', 'quantidade'
    ];
}

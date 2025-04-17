<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    /** @use HasFactory<\Database\Factories\CarrinhoFactory> */
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function produto() {
        return $this->belongsTo(Produto::class);
    }

    protected $fillable = [
        'user_id',
        'produto_id',
    ];
}

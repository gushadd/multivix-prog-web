<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function carrinhos() {
        return $this->hasMany(Carrinho::class);
    }

     /**
      * The attributes that are mass assignable.
      *
      * @var list<string>
      */
     protected $fillable = [
         'nome',
         'descricao',
         'valor',
         'categoria',
         'foto',
     ];

     /**
      * The attributes that should be hidden for serialization.
      *
      * @var list<string>
      */
     protected $hidden = [

     ];
}

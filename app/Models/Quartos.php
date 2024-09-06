<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Quartos extends Model
{
    protected $table = 'quartos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nome',
    'descricao',
    'valor',
    'parcelas',
    'lotacao',
    'imagem',
    'promocao'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}

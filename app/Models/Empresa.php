<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'cep',
    'pais',
    'email',
    'estado',
    'cidade',
    'whatsapp',
    'facebook',
    'telefone',
    'telefone2',
    'endereco',
    'descricao',
    'instagram',
    'tripadvisor',
    'nomefantasia',
    'nossahistoria',
    'palavraschave'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}

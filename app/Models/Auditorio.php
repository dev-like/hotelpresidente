<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Auditorio extends Model
{
    protected $table = 'auditorio';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'titulo',
    'texto',
    'imagem'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}

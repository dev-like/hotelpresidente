<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class InfoQuarto extends Model
{
    protected $table = 'infoquartos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'descricao',
    'quarto_id'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Galeria extends Model
{
    protected $table = 'galeria_quartos';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'horizontal',
    'horizontal1',
    'vertical',
    'vertical1',
    'quadrado',
    'quadrado1',
    ];

    use SoftDeletes, CascadeSoftDeletes;
}

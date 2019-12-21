<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metum extends Model
{
    use SoftDeletes;

    public $table = 'meta';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'key',
        'model',
        'value',
        'object',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

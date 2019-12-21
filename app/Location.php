<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    public $table = 'locations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
        'from_main_gate',
    ];

    public function locationProducts()
    {
        return $this->hasMany(Product::class, 'location_id', 'id');
    }
}

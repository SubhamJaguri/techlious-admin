<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use SoftDeletes;

    public $table = 'agents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'name',
        'phone',
        'address',
        'twitter',
        'facebook',
        'instagram',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agentProducts()
    {
        return $this->hasMany(Product::class, 'agent_id', 'id');
    }
}

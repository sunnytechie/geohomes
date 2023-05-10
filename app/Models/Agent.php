<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';
    
    use HasFactory;

    //belongs to user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

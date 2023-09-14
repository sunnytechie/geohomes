<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function plots()
    {
        return $this->hasMany('App\Models\Plot');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function client()
    {
        return $this->hasOne('App\Models\Client');
    }
}

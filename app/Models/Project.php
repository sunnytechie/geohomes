<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    
    use HasFactory;

    //belongs to user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function plots()
    {
        return $this->hasMany('App\Models\Plot');
    }

    public function inspectiontransactions()
    {
        return $this->hasMany('App\Models\Inspectiontransaction');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}

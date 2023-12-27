<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'video',
        'title',
        'description',
        'office_heading',
        'office_location',
        'office_map',
    ];

    use HasFactory;
}

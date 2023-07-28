<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    use HasFactory;

    public function building()
    {
        return $this->belongsTo('App\Models\Building');
    }

}

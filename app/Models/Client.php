<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    use HasFactory;

    //belongs to transaction
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }

}

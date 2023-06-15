<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    protected $table = 'properties';

    use HasFactory, Searchable;

    //belongs to user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        unset($array['created_at, updated_at']);

        return [
            'lint_in' => $this->lint_in,
            'category' => $this->category,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'state' => $this->state,
            'title' => $this->title,
        ];
    }
}

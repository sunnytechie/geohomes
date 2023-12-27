<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "body", "image", "category_id", "status", "type", "views", "author"];
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

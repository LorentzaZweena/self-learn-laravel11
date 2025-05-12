<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    //untuk relasi ke post, satu category dimiliki oleh banyak post
    public function posts(): HasMany{
        return $this->hasMany(Post::class);
    }
}

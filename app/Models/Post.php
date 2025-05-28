<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    //untuk eager loading relasi author dan category
    //jadi ketika kita mengambil data post, data author dan category juga ikut diambil
    protected $with = ['author', 'category'];

    //untuk relasi ke user, satu post dimiliki oleh satu user
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //untuk relasi ke category, satu post dimiliki oleh satu category
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

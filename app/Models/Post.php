<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    //untuk relasi ke user, satu post dimiliki oleh satu user
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

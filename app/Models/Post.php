<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeFilter(Builder $query, array $filters): void{
        //jika ada filter 'search' di request, maka jalankan query ini
        //fn : arrow function, digunakan untuk membuat fungsi anonim yang lebih ringkas
        //jika tidak ada filter 'search', maka query ini tidak dijalankan
        //intinya jika ada filter 'search', maka query ini akan mencari data post yang judulnya mengandung string yang dicari
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );

        //jika ada filter 'category' di request, maka jalankan query ini
        //jika tidak ada filter 'category', maka query ini tidak dijalankan
        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }
}

<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Zweena Ariva', 'title' => 'Contact']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => 
        Post::all()
    ]);
});

// {id} : parameter rute yang diteruskan ke fungsi closure sebagai $id

Route::get('/posts/{post:slug}', function(Post $post) {
    // $post = Post::find($id);

    //single post : buat ngubah judul halaman
    return view('post', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/authors/{user}', function(User $user) {
    // $post = Post::find($id);

    //single post : buat ngubah judul halaman
    return view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

<?php

use App\Models\Category;
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
    // ditaro divariable $posts dulu untuk mengambil semua data dari model Post
    // latest() untuk mengambil data terbaru
    // get() untuk mengambil semua data
    // with() untuk mengambil relasi dari model Post
    // $posts = Post::with(['author', 'category'])->latest()->get();

    //dump(request('search')); untuk menampilkan data yang dikirim melalui query string
    // dump(request('search'));

    // $posts = Post::latest();
    // if(request('search')){
            // filter data berdasarkan query string 'search'
    //     $posts->where('title', 'like', '%' . request('search') . '%');
    // }
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

// {id} : parameter rute yang diteruskan ke fungsi closure sebagai $id

Route::get('/posts/{post:slug}', function(Post $post) {
    // $post = Post::find($id);

    //single post : buat ngubah judul halaman
    return view('post', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});


Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' =>'Articles in ' . $category->name, 'posts' => $category->posts]);
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

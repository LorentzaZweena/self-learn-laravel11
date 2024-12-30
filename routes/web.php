<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Zweena Ariva', 'title' => 'Contact']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-postingan-1',
            'title' => 'Judul Postingan 1', 
            'author' => 'Zweena Ariva', 
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus repudiandae debitis libero veritatis, modi voluptates ipsum obcaecati perspiciatis! Nisi a cupiditate ut culpa qui id ratione consequuntur praesentium, dicta veniam?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-postingan-2',
            'title' => 'Judul Postingan 2', 
            'author' => 'Ariva Zweena', 
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam architecto sapiente accusamus quidem perspiciatis dolore velit ab saepe commodi delectus, laudantium doloribus qui, veritatis nobis, optio ipsum exercitationem corrupti! Ad?'
        ],
    ]]);
});

// {id} : parameter rute yang diteruskan ke fungsi closure sebagai $id

Route::get('/posts/{slug}', function($slug){
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-postingan-1',
            'title' => 'Judul Postingan 1',
            'author' => 'Zweena Ariva',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus repudiandae debitis libero veritatis, modi voluptates ipsum obcaecati perspiciatis! Nisi a cupiditate ut culpa qui id ratione consequuntur praesentium, dicta veniam?'
        ],
        [
            'id' => 2,
            'slug' => 'judul-postingan-2',
            'title' => 'Judul Postingan 2',
            'author' => 'Ariva Zweena',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam architecto sapiente accusamus quidem perspiciatis dolore velit ab saepe commodi delectus, laudantium doloribus qui, veritatis nobis, optio ipsum exercitationem corrupti! Ad?'
        ],
    ];

    //Arr::first() : mengambil data pertama dari array yang memenuhi kondisi / syarat yang diberikan
    //use($id) : menggunakan variabel $id di dalam fungsi closure
    //return $post['id'] == $id : mengembalikan nilai true jika id dari post sama dengan id yang dikirimkan melalui parameter rute

    //function($post) : parameter fungsi closure
    //$posts : Array
    //$post merepresentasikan setiap item array yang sedang dicheck
    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    //single post : buat ngubah judul halaman
    return view('post', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

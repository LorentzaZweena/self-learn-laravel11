<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Zweena Ariva', 'title' => 'Contact']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'posts' => [
        [
            'title' => 'Judul Postingan 1', 
            'author' => 'Zweena Ariva', 
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus repudiandae debitis libero veritatis, modi voluptates ipsum obcaecati perspiciatis! Nisi a cupiditate ut culpa qui id ratione consequuntur praesentium, dicta veniam?'
        ],
        [
            'title' => 'Judul Postingan 2', 
            'author' => 'Zweena Ariva', 
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam architecto sapiente accusamus quidem perspiciatis dolore velit ab saepe commodi delectus, laudantium doloribus qui, veritatis nobis, optio ipsum exercitationem corrupti! Ad?'
        ],
    ]]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

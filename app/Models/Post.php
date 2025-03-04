<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Post {
    public static function all(){
        return [
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
    }

    public static function find($slug) : array{
        // return Arr::first(static::all(), function($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        $post =  Arr::first(static::all(), fn ($post) => $post['slug'] = $slug);

        if(!$post){
            abort(404);
        }

        return $post;
    }
}
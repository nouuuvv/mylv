<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about.about', ['title' => 'About Page', 'name' => 'Novan Ramadani']);
});

Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->latest()->get();
    $posts = Post::latest()->get();
    return view('blog.posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function(Post $post){    
        return view('blog.post', ['title' => 'Single Post', 'post' => $post]);
});


Route::get('/authors/{user:username}', function(User $user){    
    // $posts = $user->posts->load('category', 'author');

        return view('blog.posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});


Route::get('/categories/{category:slug}', function(Category $category){ 
    // $posts = $category->posts->load('category', 'author');

        return view('blog.posts', ['title' => count($category->posts) . ' Articles in : ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact.contact', ['title' => 'Contact Page']);
});


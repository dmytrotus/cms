<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category; //Для використання категорій
use App\Tag; //Для використання тагів
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Middleware\VerifyCategoriesCount;

class FrontEndController extends Controller
{
    public function posts()
    {
    	return view('showblogpost.index')->with('posts', Post::all());

    }

     public function onepost($slug)
    {
    	$post = Post::where('slug', '=', $slug)->first();

        return view('showblogpost.single')->with('post', $post);

    }


    public function products()
    {
    	return view('showproduct.index')->with('products', Product::all());
    }
}

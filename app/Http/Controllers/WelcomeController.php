<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;


class WelcomeController extends Controller
{
    public function index()
    {
    	$search = request()->query('search');

    	if($search){
    		//dd(request()->query('search'));

    		$posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);//обовязково має бути paginate()

 

    		//$posts = Post::where('title', 'LIKE', '%{$search}%')->simplePaginate(3);
    	} else {

    		//$posts = Post::all();
    		$posts = Post::simplePaginate(3);
    	}

    	return view('welcome')
    	->with('categories', Category::all())
    	->with('tags', Tag::all())
    	->with('posts', $posts);
    }
}

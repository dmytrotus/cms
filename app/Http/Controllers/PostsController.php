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

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Category::first()->posts);

        return view('posts.index')->with('posts', Post::all())
        ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //dd($request->all()); //робив для тегів
        // upload the image
        //dd($request->image);
        //dd($request->image->store('posts')); //- спочатку дивимось чи залишає хеш
        /*Страндартно в ларавел всі файли кодуються і приватні. Щоб файли або фотки були для public треба зайти config\filesystems.php 'default' => env('FILESYSTEM_DRIVER', 'local'),
        це значить що файлова система закодована. В файлі filesystems.php нічого не міняємо, але в файлі в головній директорії .env після рядків про БД (необовязково) ставимо FILESYSTEM_DRIVER=public
        потім щоб зробити память доступною то треба написати php artisan storage:link */
       $image = $request->image->store('posts');
        // create the post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'image' => $image,
            'slug' => str_slug($request->title),
            'category_id' => $request->category
                
        ]);

        if ($request->tags) { ///додаємо теги
            $post->tags()->attach($request->tags);
        }

        //flash the message

        session()->flash('success','Пост успішно сворений');
        //redirect the user
        return redirect(route('posts.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //return $slug;
        $post = Post::where('slug', '=', $slug)->first();

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title','description','published_at','content', 'slug']);

        //$post = Post::find($id);


        //Розбираемось з фоткою
        if ($request->hasFile('image')){

            $image = $request->image->store('posts');

            //delete old image
            Storage::delete($post->image);

            $data['image'] = $image;

        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }


        //обновляемо атрибути
        $post->update($data);


        

        //показуемо повідомлення про оновлення

        session()->flash('success', 'Запис оновлено');

        return redirect(route('posts.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        /*$post = Post::withTrashed()->where('id', $id)->firstOrFail(); так казав той тіп робити щоб сайт був безпечний, але коли ставлю то якась херня з видалиними фотками відбувається і тому краще так не ставити мені поки не розберусь що до чого*/
        

        if ($post->trashed()){

           /* Storage::delete($post->image);*/ /*Закоментував це тому що робимо видалення через модель, до цього все працювало просто я в моделі дописав метод deleteImage*/ 

           $post->deleteImage();


            $post->forceDelete();
        }

        else {
            $post->delete();
        }

        session()->flash('success','Пост видалено');

        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();


        return view('posts.index')->with('categories', Category::all())
        ->withPosts($trashed); //withPost($trashed) те саме що with('posts', $trashed)

    }


    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        session()->flash('success', 'Запис відновлено з кошика');

        return redirect()->back();
    }

    public function allcats() //показую всі категорії
    {
        return view('categories.allcats-index')->with('categories', Category::all());
    }

    public function category(Category $category) //показую всі категорії
    {
        return view('categories.category')->with('category', $category)
        ->with('posts', $category->posts()->paginate(1))->with('categories', Category::all());
    }

    
}

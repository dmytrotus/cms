<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$category1 = Category::create([
    		'name' => 'News'
    	]);
    	$category2 = Category::create([
    		'name' => 'Marketing'
    	]);
    	$category3 = Category::create([
    		'name' => 'Partnership'
    	]);
    	
        $post1 = Post::create([
        	'title' => 'We relocated our office to a new designed garage',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium repellendus quae tenetur deserunt sequi vitae, ad labore minima inventore doloribus quia nobis. Incidunt nisi in excepturi magni quos veritatis, ab.',
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi perspiciatis dolores quasi accusamus, odit corporis cumque dolorum eius! Saepe quo rerum, iure officiis officia ducimus aspernatur optio ut itaque atque!',
        	'category_id' => $category1->id,
        	'image' => 'posts/1.jpg'
        ]);

        $post2 = Post::create([
        	'title' => 'Top 5 brilliant content marketing strategies',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium repellendus quae tenetur deserunt sequi vitae, ad labore minima inventore doloribus quia nobis. Incidunt nisi in excepturi magni quos veritatis, ab.',
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi perspiciatis dolores quasi accusamus, odit corporis cumque dolorum eius! Saepe quo rerum, iure officiis officia ducimus aspernatur optio ut itaque atque!',
        	'category_id' => $category2->id,
        	'image' => 'posts/2.jpg'
        ]);
        $post3 = Post::create([
        	'title' => 'Best practices for minimalist design with example',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium repellendus quae tenetur deserunt sequi vitae, ad labore minima inventore doloribus quia nobis. Incidunt nisi in excepturi magni quos veritatis, ab.',
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi perspiciatis dolores quasi accusamus, odit corporis cumque dolorum eius! Saepe quo rerum, iure officiis officia ducimus aspernatur optio ut itaque atque!',
        	'category_id' => $category3->id,
        	'image' => 'posts/3.jpg'
        ]);
        $post4 = Post::create([
        	'title' => 'Best practices for minimalist design with example',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium repellendus quae tenetur deserunt sequi vitae, ad labore minima inventore doloribus quia nobis. Incidunt nisi in excepturi magni quos veritatis, ab.',
        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi perspiciatis dolores quasi accusamus, odit corporis cumque dolorum eius! Saepe quo rerum, iure officiis officia ducimus aspernatur optio ut itaque atque!',
        	'category_id' => $category2->id,
        	'image' => 'posts/4.jpg'
        ]);

        $tag1 = Tag::create([
    		'name' => 'job'
    	]);
    	$tag2 = Tag::create([
    		'name' => 'customers'
    	]);
    	$tag3 = Tag::create([
    		'name' => 'record'
    	]);
    	$post1->tags()->attached([$tag1->id, $tag2->id]);
    	$post2->tags()->attached([$tag2->id, $tag3->id]);
    	$post1->tags()->attached([$tag1->id, $tag3->id]);
    }
}

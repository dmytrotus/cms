<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts() //ця фунція в моделі Категорії для того щоб було створити залежність
    {
    	return $this->hasMany(Post::class);
    }
    //Сноска про категорії
    //1) Створюємо таблицю з category_id в таблиці постів 
    //2) Пишемо функцію в моделі постів belongsTo
    //3) Пишемо функцію в моделі категорій hasMany
    //4) Робимо drop down меню в view зі створенням поста
    //5) Дописуємо в PostController в функцію create ->with('categories', Category::all());
    //6) Через @foreach($categories as $category) виводимо з БД категорій самі категорії (не забути закрити foreach)
    //7) В PostController Create дописуємо ще одне значення 'category_id' => $request->category(request саме категорія а не категорія айді тому що в нас такий select в view)
    //8) Переконатись що обновив CreatePostRequest на наявность категорії
    //9) Якщо не зможе записати в БД то перевірити в моделі Post fillable property
    //10) Undefined variable: categories після натискання редагування посту. Треба додати в функцію edit PostController 
}

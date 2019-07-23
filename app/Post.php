<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

	use SoftDeletes;

	
    protected $fillable = [
    	'title','description','content','image','published_at', 'slug', 'category_id'
    ];



    public function deleteImage(){


			Storage::delete($this->image);
		}

		/*Тут зробив нову функцію, можна додавати але до закриття останньої фігурної дужки, інакше не буде працювати*/


	public function category() //Це роблю для того щоб створювати залежність, вона обовязково має називатися так як категорії але в однині (походу потім через foreach буде працювати але ще не знаю. п.с. таблиця в БД має точно таку саму назву)
	//Це я зробив в моделі Post тобто тієї яка буде всередині категорій, далі йдемо в модель Category і так робимо залежність іншою функцією return $this->hasMany(Post::class);
	{
		return $this->belongsTo(Category::class); //belongsTo(App\Category); інший варіант
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}


	/*Функція яка перевіряє чи є теги*/
	public function hasTag($tagId)
	{
		return in_array($tagId, $this->tags->pluck('id')->toArray());
	}

}



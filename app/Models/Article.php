<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ["title","desc","thumbnail","category_id"];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function keywords(){
        return $this->belongsToMany(Keyword::class,"article_keywords","article_id","keyword_id");
    }
}

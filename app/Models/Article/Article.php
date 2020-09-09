<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Article extends Model
{
    protected $fillable = ['title', 'body', 'slug', 'subject_id'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

}

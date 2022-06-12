<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function getTitleAttribute($attribute)
    {
        return Str::title($attribute);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($content)
    {
        Comment::create([
            'post_id' => $this->id,
            'user_id' => Auth()->user()->id,
            'content' => $content
        ]);
    }
}

<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        "title",
        "content",
        "excerpt",
        "status",
        "category_id",
        "user_id",
        "published_at",
    ];
    protected $casts = [
        "published_at" => "datetime",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where("status", "published");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'description', 'user_id', 'img'];

    public function user()
    {
//        return $this->belongsTo('App/User');
        return $this->belongsTo(User::class);
    }

    public function human_readable_date()
    {
//        $this->create_at
        return $this->created_at->format('l jS \\of F Y h:i:s A');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

// ORM => Eloquent
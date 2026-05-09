<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'content',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }

    // 自分をフォローしている人
    public function followers()
    {
        return $this->belongsToMany(
            Subject::class,
            'follows',
            'following_id',
            'follower_id'
        );
    }

    // 自分がフォローしている人
    public function followings()
    {
        return $this->belongsToMany(
            Subject::class,
            'follows',
            'follower_id',
            'following_id'
        );
    }
}

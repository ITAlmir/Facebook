<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function comment()
    {
       return $this->hasMany(Comment::class);
    }
    protected $fillable =[
        'id',
        'firstname',
        'lastname',
        'user_id',
        'title',
        'email',
        'thumbnail',
        'news',
        'newsText',
    ];

    protected $hidden=[
        'remember_token',
    ];
    
}

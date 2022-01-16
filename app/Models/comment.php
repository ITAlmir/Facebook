<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'id',
        'firstname',
        'lastname',
        'user_id',
        'commented',
        'post_id',
        'newsText',
    ];

    protected $hidden=[
        'remember_token',
    ];
}

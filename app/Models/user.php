<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class user extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    public function post()
    {
       return $this->hasMany(Post::class);
    }
    
    protected $fillable =[
        'firstname',
        'lastname',
        'age',
        'password',
        'email',
        'thumbnail',
    ];

    protected $hidden=[
        'password',
        'remember_token',
    ];
}

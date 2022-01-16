<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    public function user()
    {
       return $this->belongsTo(User::class);
    }
    protected $fillable =[
        'id',
        'firstname',
        'lastname',
        'message',
        'thumbnail',
        'user_id',
        'sent_id',
    ];

    protected $hidden=[
        'remember_token',
    ];
}

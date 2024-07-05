<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    protected $fillable = ([
        'role','user_id','ip','user_agent','device','status',
    ]); 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

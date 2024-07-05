<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    Protected $fillable = ([
        'type','room','size','rent','location','user_id','is_read','status','location'
    ]);

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

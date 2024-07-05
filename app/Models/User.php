<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable  implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, InteractsWithMedia, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'status',
        'email',
        'password',
        'number',
        'address',
        'city',
        'image',
        'email_verified_at',
        'contract',
        'package_id',
        'expire_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
    }
    public function notification()
    {
        return $this->hasMany(Notification::class,  'user_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }
}

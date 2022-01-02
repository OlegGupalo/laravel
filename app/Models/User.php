<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\SendVerifyWithQueueNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    public static function getRoles() {
        return [
            SELF::ROLE_ADMIN => 'Админ',
            SELF::ROLE_READER => 'Читатель',
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function SendEmailVerificationNotification() {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    public function getName() {
        return $this->name;
    }
}

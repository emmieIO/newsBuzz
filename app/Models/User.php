<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function posts() {
        return $this->hasMany(Post::class);
    }

    function followers() {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }
    function following() {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    function isFollowing(User $user) {
        return $this->followers()
        ->where('followed_id', $user->id)->get()->count();
    }

    function isFollowedBy(User $user) {
        return $this->following()
        ->where('follower_id', $user->id)->get()->count();
    }
}

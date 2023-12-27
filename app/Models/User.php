<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fname',
        'lname',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
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

 public function mypets()
    {
        return $this->hasMany(Mypet::class, 'userid');
    }

   public function photos()
    {
        return $this->hasMany(UserPhoto::class);
    }

    /**
     * Get the profile image for the user.
     */
    public function profileImage()
    {
        return $this->hasOne(UserPhoto::class)->where('is_profile', true);
    }

//public function friends()
//    {
//        return $this->hasMany(Friend::class, 'user_id');
//    }

public function friends()
{
    return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')->withPivot('status');
}



    public function friendOf()
    {
        return $this->hasMany(Friend::class, 'friend_id');
    }

public function isFriend()
    {
        return Friend::where('user_id', auth()->id())
            ->where('friend_id', $this->id)
            ->where('status', 'approved')
            ->exists();
    }



 public function friendStatus()
    {
        $friendship = Friend::where(function ($query) {
            $query->where('user_id', auth()->id())
                ->where('friend_id', $this->id)
                ->where('status', 'pending');
        })->orWhere(function ($query) {
            $query->where('user_id', $this->id)
                ->where('friend_id', auth()->id())
                ->where('status', 'pending');
        })->first();

        return $friendship ? 'pending' : null;
    }

}

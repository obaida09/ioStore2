<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use EntrustUserWithPermissionsTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'mobile',
        'user_image',
        'status',
        'email',
        'password',
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
    
    public function receivesBroadcastNotificationsOn()
    {
        return 'App.Models.User.' . $this->id;
    }


    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function supervisors()
    {
        $supervisors = User::whereHas('roles', function ($query) {
            $query->where('name', 'supervisor');
        });
        return $supervisors;
    }

    public function customers()
    {
        $customers = User::whereHas('roles', function ($query) {
            $query->where('name', 'customer');
        });
        return $customers;
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }
}

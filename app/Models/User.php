<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'referral_code',
        'password',
        'validated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'referral_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'validated_at' => 'datetime',
    ];

    public function referral()
    {
        return $this->hasOne(Referral::class, 'user_id', 'id');
    }
    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id', 'user_id');
    }
    public function dropshippings()
    {
        return $this->hasMany(Order::class, 'id', 'reseller_id');
    }
    public function banks()
    {
        return $this->hasMany(Bank::class);
    }
}

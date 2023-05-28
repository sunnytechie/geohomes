<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'country',
        'user_type',
        'company_name',
        'company_type',
        'website',
        'address',
        'city',
        'zip',
        'password',
        'email_verified_at',
    ];

    //Has one agent
    public function agent()
    {
        return $this->hasOne('App\Models\Agent');
    }

    //hasMany project
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    //hasMany property
    public function property()
    {
        return $this->hasMany('App\Models\Property');
    }

    //hasMany invoice
    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    //hasMany destination
    public function destination()
    {
        return $this->hasMany('App\Models\Destination');
    }

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
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\ReferClient;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'subject',
        'phone_no',
        'type',
        'status',
        'brokerage',
        'contact',
        'state',
        'message',
        'password',
        'show_password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_agents(){
        return $this->belongsTo(User::class,'id');
    }

    // public function getNameAttribute()
    // {
    //   return $this->first_name . " " . $this->last_name;
    // }

    public function getcity(){
        return $this->belongsTo(City::class,'location');
    }
    public function getstate(){
        return $this->belongsTo(State::class,'state');
    }

}

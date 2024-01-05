<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ReferClient extends Model
{
    protected $fillable = [
        'name',
        'location',
        'phone_number',
        'email',
        'price',
        'category',
        'note',
        'agent_id',
        'user_id',
        'status',
        'slug',
    ];
    use HasFactory;

    public function get_notes()
    {
        return $this->hasMany(Note::class,'client_id');
    }


    public function get_agent(){
        return $this->belongsTo(User::class,'agent_id');
    }
    public function getcity(){
        return $this->belongsTo(City::class,'location');
    }
    public function getstate(){
        return $this->belongsTo(State::class,'state');
    }
    public function getemail(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getagentdetail(){
        return $this->belongsTo(User::class,'agent_id');
    }
}

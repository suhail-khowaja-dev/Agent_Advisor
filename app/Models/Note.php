<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'contact_established',
        'meeting',
        'contract',
        'address',
        'sale_price',
        'closed',
        'agent_id',
        'status_id_1',
        'status_id_2',
        'status_id_3',
        'status_id_4',
        'client_id',
        'slug',
    ];
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo(ReferClient::class,'id');
    // }
}

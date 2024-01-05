<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNote extends Model
{
    use HasFactory;

    public function getNotName(){
        return $this->belongsTo(Page::class,'page_id');
    }
}

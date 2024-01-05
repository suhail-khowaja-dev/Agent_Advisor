<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_id',
        'contact_title',
        'client_title',
        'profile_title',
        'contact_description',
        'client_description',
        'profile_description',
    ];
    use HasFactory;

    public function getPageName(){
        return $this->belongsTo(Page::class,'page_id');
    }
}

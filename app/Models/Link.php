<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        "url",
        "point",
        "active"
    ];
    
    public function clickHistories()
    {
        return $this->hasMany(ClickHistory::class, 'link_id');
    }

}

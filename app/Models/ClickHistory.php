<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClickHistory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'link_id', 'point'];
    /**
     * Get the user associated with the ClickHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use App\Enums\PaymentRequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaymentRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "amount",
        "method",
        "pay_number",
    ];

    protected $casts = [
    ];

    function user() : HasOne {
        return $this->hasOne(User::class, "id", "user_id");
    }
}

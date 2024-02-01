<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\AccountRole;
use App\Enums\AccountStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public static $gender = ['male', 'female','other'];
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'area', 'refer_by_code',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clickHistory(): HasMany
    {
        return $this->hasMany(ClickHistory::class, 'user_id', 'id');
    }

    public static function generateUniqueReferCode()
    {
        $referCode = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        // Check if the generated code already exists in the 'refer_code' column
        while (User::where('refer_code', $referCode)->exists()) {
            $referCode = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        }

        return $referCode;
    }

    public static function byReferCode(string $code) : ?User{
        $user = User::where('refer_code', $code)->first();
        return $user;
    }


    function isAccountActive() : bool {

        if($this->status == AccountStatus::Active->value){
            return true;
        }

        return false;
    }

    function getAccountStatusMsg() : string {
        return "Your account is ".AccountStatus::tryFrom($this->status) ?? 'Undefined';
    }

    function getAccountRole() : string {
        return AccountRole::tryFrom($this->role) ?? 'Undefined';
    }

    function getClickBalance() : int {
        $clickBalance = ClickHistory::where('user_id', $this->id)->sum('point');
        return $clickBalance;
    }

}



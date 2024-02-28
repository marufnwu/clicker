<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\AccountRole;
use App\Enums\AccountStatus;
use App\Enums\PaymentRequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public static $gender = ['male', 'female', 'other'];
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'gender', 'area', 'refer_by_code', 'photo_url',
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

    public function scopeReferral($query)
    {
        return $query->select('*')
            ->from(DB::raw('(SELECT * FROM users WHERE id = :userId
                UNION
                SELECT users.* FROM users JOIN users AS referral ON referral.id = users.refer_by WHERE referral.id != :userId) AS referral'))
            ->addBinding($this->id, 'select')
            ->addBinding($this->id, 'select');
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

    public static function byReferCode(string $code): ?User
    {
        $user = User::where('refer_code', $code)->first();
        return $user;
    }


    function isAccountActive(): bool
    {

        if ($this->status == AccountStatus::Active->value) {
            return true;
        }

        return false;
    }

    function getAccountStatusMsg(): string
    {
        return "Your account is " . AccountStatus::tryFrom($this->status) ?? 'Undefined';
    }

    function getAccountRole(): string
    {
        return AccountRole::tryFrom($this->role)->name ?? 'Undefined';
    }

    function getClickBalance(): int
    {
        $clickBalance = ClickHistory::where('user_id', $this->id)->sum('point');
        return $clickBalance;
    }

    function referBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'refer_by');
    }

    function points()
    {
        $totalPoint = ClickHistory::where("user_id", $this->id)->sum("point");

        $totalWithdraw = PaymentRequest::where("user_id", $this->id)
            ->where("status", PaymentRequestStatus::PENDING->value)
            ->orWhere("status", PaymentRequestStatus::COMPLETE->value)->sum("amount");


        $currPoint = $totalPoint - $totalWithdraw;
        return $currPoint;
    }

    function level()
    {
        $id = $this->id;
        $result = DB::select("
                WITH RECURSIVE referral AS (
                    SELECT id, refer_by, 0 AS L FROM users WHERE id = ".$id."
                    UNION
                    SELECT users.id, users.refer_by, L+1 FROM referral JOIN users ON referral.id = users.refer_by
                ),
                final AS (
                    SELECT *, COUNT(id) AS total_user FROM referral GROUP BY refer_by HAVING total_user >= 6
                )
                SELECT MAX(L) AS level FROM final
                GROUP BY L HAVING SUM(total_user) >= POWER(6, L) ORDER BY  level DESC LIMIT 1
        ");

        // Check if there are any results
        if (!empty($result)) {
            // Access the value using array notation
            $maxLevel = $result[0]->level;
            return $maxLevel;
        } else {
            // Handle the case when there are no results
            return 0;
        }
    }
}

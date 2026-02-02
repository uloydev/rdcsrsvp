<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'category',
        'email_verified_at',
        "additional_participant",
        'checkin_at',
        'token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'checkin_at' => 'datetime',
    ];

    protected $hidden = [
        'email_verified_at',
        'token',
    ];

    public function getParticipantNumberAttribute(): string
    {
        return str_pad($this->id ?? "", 3, '0', STR_PAD_LEFT);
    }

    // public function getCheckinAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['checkin_at'] ? Carbon::parse($this->attributes['checkin_at'])->addHours(7) : null;
    // }

    // public function getEmailVerifiedAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['email_verified_at'] ? Carbon::parse($this->attributes['email_verified_at'])->addHours(7) : null;
    // }

    // public function getKitReceivedAtAttribute()
    // {
    //     // format from utc to gmt+7 using Carbon
    //     return $this->attributes['kit_received_at'] ? Carbon::parse($this->attributes['kit_received_at'])->addHours(7) : null;
    // }

    public function getVerificationLink(): string
    {
        return route('participant.verify', ['token' => $this->token]);
    }
}
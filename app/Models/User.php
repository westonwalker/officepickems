<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function last_league() {
        return $this->hasOne(League::class, 'last_league_id');
    }

    public function owners() {
        return $this->hasMany(Group::class, 'owner_id');
    }
    
    public function groups() {
        return $this->belongsToMany(Group::class);
    }
    
    public function leagues() {
        return $this->belongsToMany(League::class);
    }

    public function quiz_answers() {
        return $this->hasMany(QuizAnswer::class);
    }
}
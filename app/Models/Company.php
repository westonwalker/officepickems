<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function subscription_plan() {
        return $this->hasOne(SubscriptionPlan::class);
    }
    
    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function leagues() {
        return $this->hasMany(League::class);
    }
}
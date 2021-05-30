<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function subscription_plan() {
        return $this->belongsTo(SubscriptionPlan::class);
    }
    
    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function leagues() {
        return $this->hasMany(League::class);
    }
}
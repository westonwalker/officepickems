<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueMode extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function league_type() {
        return $this->belongsTo(LeagueType::class);
    }

    public function leagues() {
        return $this->hasMany(League::class);
    }
}
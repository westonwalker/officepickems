<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueType extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    // public function league_modes() {
    //     return $this->hasMany(LeagueMode::class);
    // }

    public function leagues() {
        return $this->hasMany(League::class);
    }

    public function teams() {
        return $this->hasMany(Team::class);
    }

    public function games() {
        return $this->hasMany(Game::class);
    }
}
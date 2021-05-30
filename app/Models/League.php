<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function league_mode() {
        return $this->belongsTo(LeagueMode::class);
    }
    
    public function season() {
        return $this->belongsTo(Season::class);
    }
    
    public function group() {
        return $this->belongsTo(Group::class);
    }
    
    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function quizes() {
        return $this->hasMany(Quiz::class);
    }
}
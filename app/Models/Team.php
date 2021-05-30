<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];
 
    public function league_type() {
        return $this->belongsTo(LeagueType::class);
    }

    public function winners() {
        return $this->hasMany(Game::class, 'winner_id');
    }

    public function away_games() {
        return $this->hasMany(Game::class, 'away_game_id');
    }

    public function home_games() {
        return $this->hasMany(Game::class, 'home_game_id');
    }

    public function quiz_answers() {
        return $this->hasMany(QuizAnswer::class);
    }
}
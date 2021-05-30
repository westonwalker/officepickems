<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];
 
    public function league_type() {
        return $this->belongsTo(LeagueType::class);
    }
 
    public function season() {
        return $this->belongsTo(Season::class);
    }
 
    public function home_team() {
        return $this->belongsTo(Team::class, 'home_team_id');
    }
 
    public function away_team() {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
 
    public function winner() {
        return $this->belongsTo(Team::class, 'winner_id');
    }

    public function quiz_questions() {
        return $this->hasMany(QuizQuestion::class);
    }
}
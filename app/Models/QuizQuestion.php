<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    
    protected $guarded = [];
 
    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function quiz_answers() {
        return $this->hasMany(QuizAnswer::class);
    }
}
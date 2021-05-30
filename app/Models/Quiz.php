<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function league() {
        return $this->belongsTo(League::class);
    }

    public function quiz_questions() {
        return $this->hasMany(QuizQuestion::class);
    }
}
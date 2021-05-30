<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;
    
    protected $guarded = [];
 
    public function quiz_question() {
        return $this->belongsTo(QuizQuestion::class);
    }
 
    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function answer() {
        return $this->belongsTo(Team::class, 'answer_id');
    }
}
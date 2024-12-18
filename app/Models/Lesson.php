<?php

namespace App\Models;

use App\Models\Cour;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'duration', 'cour_id'];

    public function course()
    {
        return $this->belongsTo(Cour::class, 'cour_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}

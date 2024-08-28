<?php

namespace App\Models;

use App\Models\Cour;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'duration', 'cours_id'];

    public function course()
    {
        return $this->belongsTo(Cour::class, 'cours_id');
    }
}

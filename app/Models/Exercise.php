<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'duration', 'cour_id'];

    public function cour()
    {
        return $this->belongsTo(Cour::class, 'cour_id');
    }
}

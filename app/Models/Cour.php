<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'updated_at',
        'created_at',
    ];

    
    // protected $attributes = [
    //     'title' => 'Titre par défaut',
    // ];
}

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

    // Relation avec les leçons
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'cours_id'); // Assurez-vous que 'cours_id' est le bon nom de la clé étrangère
    }

    
    // protected $attributes = [
    //     'title' => 'Titre par défaut',
    // ];
}

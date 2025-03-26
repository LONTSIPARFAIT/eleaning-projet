<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(Lesson::class, 'cour_id'); // Assurez-vous que 'cours_id' est le bon nom de la clé étrangère
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'cour_user')->withTimestamps();
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    // public function students()
    // {
    //     return $this->belongsToMany(Student::class);
    // }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // protected $attributes = [
    //     'title' => 'Titre par défaut',
    // ];
}

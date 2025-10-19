<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'slug',
        'description',
        'icon',
        'color',
    ];

    public function formations()
    {
        return $this->hasMany(Formation::class, 'category_id');
    }
}
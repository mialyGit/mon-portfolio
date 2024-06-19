<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'name',
        'is_visible',
    ];

    public function getIconAttribute($value)
    {
        return html_entity_decode($value);
    }
}

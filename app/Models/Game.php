<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title_id',
        'studio_id',
        'genre_id',
    ];
}

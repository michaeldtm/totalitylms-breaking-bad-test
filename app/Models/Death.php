<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'death_id',
        'cause',
        'responsible',
        'last_words',
        'season',
        'episode',
        'number_of_deaths'
    ];

    protected $casts = [
        'death_id' => 'int',
        'cause' => 'string',
        'responsible' => 'string',
        'last_words' => 'string',
        'season' => 'int',
        'episode' => 'int',
        'number_of_deaths' => 'int',
    ];
}

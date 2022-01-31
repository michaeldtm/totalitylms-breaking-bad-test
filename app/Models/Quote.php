<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'quote_id',
        'quote',
        'series'
    ];

    protected $casts = [
        'quote_id' => 'int',
        'quote' => 'string',
        'series' => 'string'
    ];
}

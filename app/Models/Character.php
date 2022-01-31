<?php

namespace App\Models;

use App\Services\BreakingBad\DeathService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'char_id',
        'name',
        'birthday',
        'occupation',
        'img',
        'status',
        'nickname',
        'appearance',
        'portrayed',
        'category'
    ];

    protected $casts = [
        'char_id' => 'int',
        'name' => 'string',
        'birthday' => 'date',
        'occupation' => 'array',
        'img' => 'string',
        'status' => 'string',
        'nickname' => 'string',
        'appearance' => 'array',
        'portrayed' => 'array',
        'category' => 'string'
    ];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    public function death(): HasOne
    {
        return $this->hasOne(Death::class);
    }

    public function status(): Attribute
    {
        return new Attribute(
            set: fn($value) => strtolower($value)
        );
    }

    public function getStatusLabelAttribute()
    {
        return [
            'alive' => 'green',
            'deceased' => 'rose',
            'unknown' => 'indigo'
        ][$this->status] ?? 'gray';
    }

    public function getTotalDeathCausedAttribute()
    {
        $service = new DeathService();
        $response = $service->getDeathCountByAuthor($this->name);

        return collect($response)->first()['deathCount'];
    }
}

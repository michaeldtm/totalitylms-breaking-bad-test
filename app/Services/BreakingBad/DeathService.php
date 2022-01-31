<?php

namespace App\Services\BreakingBad;

use Illuminate\Support\Facades\Http;

class DeathService
{
    protected string $fullUrl;

    public function __construct(protected string $baseUrl = 'https://www.breakingbadapi.com/api/',
                                protected string $service = 'deaths')
    {
        $this->fullUrl = $this->baseUrl . $this->service;
    }

    public function getAllDeaths()
    {
        $response = Http::get($this->fullUrl);
        return $response->json();
    }

    public function getDeathByName($name)
    {
        $response = Http::get($this->baseUrl . 'death', ['name' => $name]);
        return $response->json();
    }

    public function getDeathCount()
    {
        $response = Http::get($this->baseUrl . 'death-count');
        return $response->json();
    }

    public function getDeathCountByAuthor($name)
    {
        $response = Http::get($this->baseUrl . 'death-count', ['name' => $name]);
        return $response->json();
    }

    public function getRandomDeath()
    {
        $response = Http::get($this->baseUrl . 'random-death');
        return $response->json();
    }
}

<?php

namespace App\Services\BreakingBad;

use Illuminate\Support\Facades\Http;

class CharacterService
{
    protected string $fullUrl;

    public function __construct(protected string $baseUrl = 'https://www.breakingbadapi.com/api/',
                                protected string $service = 'characters')
    {
        $this->fullUrl = $this->baseUrl . $this->service;
    }

    public function getAllCharacters()
    {
        $response = Http::get($this->fullUrl);
        return $response->json();
    }

    public function getRandomCharacter()
    {
        $response = Http::get($this->baseUrl . 'character/random');
        return $response->json();
    }

    public function getCharacterById($id)
    {
        $response = Http::get($this->fullUrl . '/' . $id);
        return $response->json();
    }

    public function getCharacterByName($name)
    {
        $response = Http::get($this->fullUrl, ['name' => $name]);
        return $response->json();
    }

    public function getCharactersByCategory($category)
    {
        $response = Http::get($this->fullUrl, ['category' => $category]);
        return $response->json();
    }

    public function getPaginatedCharacters(int $offset, int $limit)
    {
        $response = Http::get($this->fullUrl, ['offset' => $offset, 'limit' => $limit]);
        return $response->json();
    }
}

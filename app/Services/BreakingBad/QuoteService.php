<?php

namespace App\Services\BreakingBad;

use Illuminate\Support\Facades\Http;

class QuoteService
{
    protected string $fullUrl;

    public function __construct(protected string $baseUrl = 'https://www.breakingbadapi.com/api/',
                                protected string $service = 'quotes')
    {
        $this->fullUrl = $this->baseUrl . $this->service;
    }

    public function getAllQuotes()
    {
        $response = Http::get($this->fullUrl);
        return $response->json();
    }

    public function getRandomQuote()
    {
        $response = Http::get($this->baseUrl . 'quote/random');
        return $response->json();
    }

    public function getRandomQuoteByAuthor($author)
    {
        $response = Http::get($this->baseUrl . 'quote/random', ['author' => $author]);
        return $response->json();
    }

    public function getQuoteById($id)
    {
        $response = Http::get($this->fullUrl . '/' . $id);
        return $response->json();
    }

    public function getQuotesBySeries($series)
    {
        $response = Http::get($this->fullUrl, ['series' => $series]);
        return $response->json();
    }

    public function getQuotesByAuthor($author)
    {
        $response = Http::get($this->baseUrl . 'quote', ['author' => $author]);
        return $response->json();
    }
}

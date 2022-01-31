<?php

namespace App\Http\Controllers\Api\BreakingBad;

use App\Http\Controllers\Controller;
use App\Services\BreakingBad\QuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct(protected QuoteService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->filled('series')) {
            return $this->service->getQuotesBySeries(request('series'));
        }
        if (request()->filled('author')) {
            return $this->service->getQuotesByAuthor(request('author'));
        }
        return $this->service->getAllQuotes();
    }

    /**
     * Display the random resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        if (request()->filled('author')) {
            return $this->service->getRandomQuoteByAuthor(request('author'));
        }
        return $this->service->getRandomQuote();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->getQuoteById($id);
    }
}

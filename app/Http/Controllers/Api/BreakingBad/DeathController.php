<?php

namespace App\Http\Controllers\Api\BreakingBad;

use App\Http\Controllers\Controller;
use App\Services\BreakingBad\DeathService;
use Illuminate\Http\Request;

class DeathController extends Controller
{
    public function __construct(protected DeathService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->getAllDeaths();
    }

    public function characterDeath()
    {
        return $this->service->getDeathByName(request('name'));
    }

    public function deathCount()
    {
        if (request()->filled('name')) {
            return $this->service->getDeathCountByAuthor(request('name'));
        }
        return $this->service->getDeathCount();
    }

    public function random()
    {
        return $this->service->getRandomDeath();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

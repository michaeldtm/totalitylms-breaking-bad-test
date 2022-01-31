<?php

namespace App\Http\Controllers\Api\BreakingBad;

use App\Http\Controllers\Controller;
use App\Services\BreakingBad\CharacterService;

use function request;

class CharacterController extends Controller
{
    public function __construct(protected CharacterService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->filled('name')) {
            return $this->service->getCharacterByName(request('name'));
        }
        if (request()->filled('category')) {
            return $this->service->getCharactersByCategory(request('category'));
        }
        if (request()->filled('offset') && request()->filled('limit')) {
            return $this->service->getPaginatedCharacters(request('offset'), request('limit'));
        }
        return $this->service->getAllCharacters();
    }

    /**
     * Display the random resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        return $this->service->getRandomCharacter();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->getCharacterById($id);
    }
}

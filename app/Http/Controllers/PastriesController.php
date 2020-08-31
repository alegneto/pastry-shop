<?php

namespace App\Http\Controllers;

use App\Services\PastryService;
use Illuminate\Http\Request;

class PastriesController extends Controller
{
    private $pastryService;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(PastryService $pastryService)
    {
        $this->pastryService = $pastryService;
    }

    public function getAll()
    {
        return $this->pastryService->getAll();
    }

    public function get($id)
    {
        return $this->pastryService->get($id);
    }

    public function store(Request $request)
    {
        return $this->pastryService->store($request);
	}

	public function update($id, Request $request)
	{
        return $this->pastryService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->pastryService->delete($id);
    }
}

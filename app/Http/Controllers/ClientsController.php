<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $clientService;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function getAll()
    {
        return $this->clientService->getAll();
    }

    public function get($id)
    {
        return $this->clientService->get($id);
    }

    public function store(Request $request)
    {
        return $this->clientService->store($request);
	}

	public function update($id, Request $request)
	{
        return $this->clientService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->clientService->delete($id);
    }
}

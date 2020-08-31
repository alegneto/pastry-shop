<?php

namespace App\Services;

use App\Repositories\ClientRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getAll()
    {
        try {
            $clients = $this->clientRepository->getAll();

            if (count($clients) > 0) {
                return response()->json($clients, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get($id)
    {
        try {
            $client = $this->clientRepository->get($id);

            if (!empty($client->id)) {
                return response()->json($client, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $car = $this->clientRepository->create($request);
            return response()->json($car, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $car = $this->clientRepository->update($id, $request);
            return response()->json($car, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $this->clientRepository->delete($id);
            return response()->json(null, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

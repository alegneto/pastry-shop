<?php

namespace App\Services;

use App\Repositories\ClientRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\Client as ValidationClient;

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
        $validator = Validator::make(
            $request->all(),
            ValidationClient::RULES
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        try {
            $client = $this->clientRepository->create($request);
            return response()->json($client, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationClient::RULES
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        try {
            $client = $this->clientRepository->update($id, $request);
            return response()->json($client, Response::HTTP_OK);
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

<?php

namespace App\Services;

use App\Repositories\PastryRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PastryService
{
    private $pastryRepository;

    public function __construct(PastryRepositoryInterface $pastryRepository)
    {
        $this->pastryRepository = $pastryRepository;
    }

    public function getAll()
    {
        try {
            $pastries = $this->pastryRepository->getAll();

            if (count($pastries) > 0) {
                return response()->json($pastries, Response::HTTP_OK);
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
            $pastry = $this->pastryRepository->get($id);

            if (!empty($pastry->id)) {
                return response()->json($pastry, Response::HTTP_OK);
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
            $pastry = $this->pastryRepository->create($request);
            return response()->json($pastry, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $pastry = $this->pastryRepository->update($id, $request);
            return response()->json($pastry, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $this->pastryRepository->delete($id);
            return response()->json(null, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error connection'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

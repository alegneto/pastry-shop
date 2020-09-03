<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Services\PastryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PastriesController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(PastryService $service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        try {
            return response()->json($this->service->getAll(), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function get($id)
    {
        try {
            return response()->json($this->service->get($id), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            return response()->json($this->service->store($request), Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return $this->error($e->getMessage(), Response::HTTP_BAD_REQUEST, $e->getDetails());
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
	}

	public function update($id, Request $request)
	{
        try {
            return response()->json($this->service->update($id, $request), Response::HTTP_OK);
        } catch (ValidationException $e) {
            return $this->error($e->getMessage(), Response::HTTP_BAD_REQUEST, $e->getDetails());
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return response()->json($this->service->delete($id), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}

<?php

namespace App\Services;

use App\Exceptions\ValidationException;
use App\Repositories\ClientRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\Client as ValidationClient;

class ClientService
{
    private $repository;

    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $clients = $this->repository->getAll();
        return (count($clients) > 0) ? $clients : [];
    }

    public function get($id)
    {
        $client = $this->repository->get($id);
        return (!empty($client->id)) ? $client : [];
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationClient::RULES
        );

        if ($validator->fails()) {
            throw new ValidationException("Error Processing Request", $validator->errors());
        }

        return $this->repository->create($request);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationClient::RULES
        );

        if ($validator->fails()) {
            throw new ValidationException("Error Processing Request", $validator->errors());
        }

        return $this->repository->update($id, $request);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}

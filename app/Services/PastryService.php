<?php

namespace App\Services;

use App\Exceptions\ValidationException;
use App\Repositories\PastryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\Pastry as ValidationPastry;

class PastryService
{
    private $repository;

    public function __construct(PastryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $pastries = $this->repository->getAll();
        return (count($pastries) > 0) ? $pastries : [];
    }

    public function get($id)
    {
        $pastry = $this->repository->get($id);
        return (!empty($pastry->id)) ? $pastry : [];
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ValidationPastry::RULES
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
            ValidationPastry::RULES
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

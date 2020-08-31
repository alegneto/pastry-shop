<?php

namespace App\Repositories;

use App\Repositories\PastryRepositoryInterface;
use App\Models\Pastries;
use Illuminate\Http\Request;

class PastryRepositoryEloquente implements PastryRepositoryInterface
{
    private $model;

    public function __construct(Pastries $pastries)
    {
        $this->model = $pastries;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function create(Request $request)
    {
        return $this->model->create($request->all());
    }

    public function update($id, Request $request)
    {
        return $this->model->find($id)
            ->update($request->all());
    }

    public function delete($id)
    {
        return $this->model->find($id)
            ->delete();
    }
}

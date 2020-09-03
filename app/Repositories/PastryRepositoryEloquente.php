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
        $pastry = $this->model->find($id);
        return (!empty($pastry->id)) ? $pastry->update($request->all()) : 0;
    }

    public function delete($id)
    {
        $pastry = $this->model->find($id);
        return (!empty($pastry) ? $pastry->delete() : null);
    }
}

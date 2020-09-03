<?php

namespace App\Repositories;

use App\Repositories\ClientRepositoryInterface;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientRepositoryEloquente implements ClientRepositoryInterface
{
    private $model;

    public function __construct(Clients $clients)
    {
        $this->model = $clients;
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
        $client = $this->model->find($id);
        return (!empty($client->id)) ? $client->update($request->all()) : 0;
    }

    public function delete($id)
    {
        $client = $this->model->find($id);
        return (!empty($client) ? $client->delete() : null);
    }
}

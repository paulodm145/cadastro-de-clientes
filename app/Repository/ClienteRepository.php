<?php

namespace App\Repository;

use App\Models\Clientes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClienteRepository
{
    protected $cliente;

    public function __construct(Clientes $cliente)
    {
       $this->cliente = $cliente;
    }

    public function findAll()
    {
        return $this->cliente::paginate();
    }

    public function findById(int $id)
    {
        return $this->cliente::find($id);
    }

    public function store(array $data)
    {
        $cliente = new Clientes();
        return $this->factoryClient($data, $cliente);
    }

    public function update(int $id, array $data)
    {
        $cliente = $this->cliente->find($id);
        return $this->factoryClient($data, $cliente);
    }

    public function delete(int $id)
    {
        $cliente = $this->cliente->find($id);
        return $cliente->delete();
    }

    /**
     * @param array $data
     * @param Clientes $cliente
     * @return Clientes
     */
    public function factoryClient(array $data, Clientes $cliente): Clientes
    {
        $cliente->name = $data['name'];
        $cliente->cpfcnpj = $data['cpfcnpj'];
        $cliente->birth_date = $data['birth_date'];
        $cliente->telephone = $data['telephone'];
        $cliente->address = $data['address'];
        $cliente->district = $data['district'];
        $cliente->number = $data['number'];
        $cliente->complement = $data['complement'];
        $cliente->city = $data['city'];
        $cliente->state = $data['state'];
        $cliente->postal_code = $data['postal_code'];
        $cliente->email = $data['email'];
        $cliente->created_at = Carbon::now();
        $cliente->save();
        return $cliente;
    }


}

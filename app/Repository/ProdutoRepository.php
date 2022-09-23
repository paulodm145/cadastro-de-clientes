<?php

namespace App\Repository;

use App\Models\Produtos;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProdutoRepository
{
    protected $product;

    public function __construct(Produtos $product)
    {
        $this->product = $product;
    }

    public function findAll()
    {
        return $this->product::paginate();
    }

    public function findById(int $id)
    {
        return $this->product::find($id);
    }

    public function store(array $data)
    {
        $product = new Produtos();
        return $this->factoryProduct($data, $product);
    }

    public function update(int $id, array $data)
    {
        $product = $this->product->find($id);
        return $this->factoryProduct($data, $product);
    }

    public function delete(int $id)
    {
        $product = $this->product->find($id);
        return $product->delete();
    }

    public function factoryProduct(array $data, Produtos $product): Produtos
    {
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->created_at = Carbon::now();
        $product->save();
        return $product;
    }
}

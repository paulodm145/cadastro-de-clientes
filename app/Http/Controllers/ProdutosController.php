<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Repository\ProdutoRepository;
use Illuminate\Http\Request;
use App\Repository\VendasRepository;

class ProdutosController extends Controller
{
    private $productsRepository;

    public function __construct(ProdutoRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function index()
    {
        return $this->productsRepository->findAll();
    }

    public function store(Request $request)
    {
        try {
            return $this->productsRepository->store($request->all());
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->productsRepository->findById($id);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            return $this->productsRepository->update($id, $request->all());
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            return response()->json($this->productsRepository->delete($id), 204);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Clientes;
use App\Repository\ClienteRepository;
use App\Service\ClienteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientesController extends Controller
{
    private $clienteRepository;
    private $clientesService;

    public function __construct(ClienteRepository $clienteRepository, ClienteService $clientesService)
    {
        $this->clienteRepository = $clienteRepository;
        $this->clientesService = $clientesService;
    }

    public function index()
    {
        return $this->clienteRepository->findAll();
    }

    public function show(int $id)
    {
        try {
            return $this->clientesService->findById($id);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function store(ClienteRequest $request)
    {
        try {
            return $this->clientesService->store($request->all());
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function update(int $id, ClienteRequest $request)
    {
        try {
            return $this->clientesService->update($id, $request->all());
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            return response()->json($this->clientesService->delete($id), 204);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()], 400);
        }
    }
}

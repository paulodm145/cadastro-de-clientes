<?php

namespace App\Service;

use App\Repository\ClienteRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClienteService
{
    private $clientesRepository;

    public function __construct(ClienteRepository $clientesRepository)
    {
        $this->clientesRepository = $clientesRepository;
    }

    public function findAll()
    {
        return $this->clientesRepository->findAll();
    }

    public function findById(int $id)
    {
        if (!$this->clientesRepository->findById($id)) {
            throw new BadRequestHttpException("Cliente não encontrado");
        }
        return $this->clientesRepository->findById($id);
    }

    public function store(array $dados)
    {
        try {
            return $this->clientesRepository->store($dados);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()]);
        }
    }

    public function update(int $id, array $dados)
    {
        try {
            $cliente = $this->clientesRepository->findById($id);
            if (!$cliente) {
                throw new BadRequestHttpException("Cliente não encontrado");
            }
            return $this->clientesRepository->update($id, $dados);
        } catch (BadRequestHttpException $e) {
            return ["erro" => $e->getMessage()];
        }
    }

    public function delete(int $id)
    {
        try {
            if (!$this->clientesRepository->findById($id)) {
                throw new BadRequestHttpException("Cliente não encontrado");
            }
            return $this->clientesRepository->delete($id);
        } catch (\Exception $e) {
            return response()->json(["erro" => $e->getMessage()]);
        }
    }
}

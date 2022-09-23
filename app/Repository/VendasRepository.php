<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class VendasRepository
{
    public function findAll()
    {
        $produtos = DB::table('pedidos AS p')->select(
                'p.id AS pedido_id',
                    'p.venda_id AS venda_id',
                    'p.produto_id',
                    'p.quantity',
                    'prod.price',
        DB::raw('(p.quantity * prod.price) AS soma_total_venda'))
        ->join('vendas AS v', 'p.venda_id', '=', 'v.id')
        ->join('produtos AS prod', 'p.produto_id', '=', 'prod.id');

        return  DB::table('clientes AS cli')->select(
            'cli.id AS cliente_id',
                    'cli.name AS nome',
                    'cli.cpfcnpj AS cpfcnpj',
                    'v.id AS venda_id',
                    DB::raw('SUM(total_venda.soma_total_venda) AS total')
            )
            ->join('vendas AS v', 'cli.id', '=', 'v.id')
            ->joinSub(
                $produtos, 'total_venda', function($join){
                    $join->on('v.id', '=', 'total_venda.venda_id');
        })->groupBy('cli.id', 'v.id')->get();
    }
}

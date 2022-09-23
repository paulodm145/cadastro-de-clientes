<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class VendasRepository
{
    public function findAll()
    {
        return DB::select("SELECT cli.id AS cliente_id,
                            cli.name AS nome,
                            cli.cpfcnpj AS cpfcnpj,
                            v.id AS venda_id,
                            SUM(total_venda.soma_total_venda) AS total
                        FROM  clientes cli
                        INNER JOIN vendas v ON cli.id = v.cliente_id
                        INNER JOIN (SELECT p.id AS pedido_id,
                                p.venda_id AS venda_id,
                                p.produto_id,
                                p.quantity,
                                prod.price,
                                (p.quantity * prod.price) AS soma_total_venda
                            FROM pedidos p
                            INNER JOIN vendas v ON p.venda_id = v.id
                            INNER JOIN produtos prod ON p.produto_id = prod.id) AS total_venda ON v.id = total_venda.venda_id
                        GROUP BY cli.id, v.id
                        ORDER BY v.id");
    }

}

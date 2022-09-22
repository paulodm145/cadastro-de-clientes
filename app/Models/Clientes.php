<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [ 'id', 'nome', 'cpfcnpj', 'data_nascimento', 'telefone', 'endereco', 'bairro', 'numero',
    'complemento', 'cidade', 'uf', 'cep', 'email'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getDataNascimentoAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}

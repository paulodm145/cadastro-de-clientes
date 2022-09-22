<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedidos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'id', 'produto_id', 'venda_id', 'quantity'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}

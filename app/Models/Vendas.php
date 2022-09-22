<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendas extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [ 'id', 'cliente_id'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}

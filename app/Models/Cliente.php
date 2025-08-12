<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['nome', 'celular', 'data_nascimento', 'cpf', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'estado'];
}

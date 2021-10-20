<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaModel extends Model
{
    use HasFactory;
    protected $table = "tema";
    protected $primaryKey = "idTema";
    
    const CREATED_AT = "data_de_criacao";
    const UPDATED_AT = "data_de_atualizacao";

    protected $guarded = []; //Variavel responsavel por indicar quais colunas não devem ser trazidas do banco
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    use HasFactory;
    protected $table = "evento";
    protected $primaryKey = "idEvento";
    
    const CREATED_AT = "data_de_criacao";
    const UPDATED_AT = "data_de_atualizacao";

    protected $guarded = []; //Variavel responsavel por indicar quais colunas não devem ser trazidas do banco
}


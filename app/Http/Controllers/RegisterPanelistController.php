<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanelistModel;
use App\Models\TemaModel;
use App\Models\PaeModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RegisterPanelistController extends Controller {
    
    public function recoveryDataBasePanelist(){
        $table = DB::select('select idPalestrante, nome, cargo, email, telefone, sexo, status from palestrante where status = 1');

        return DataTables::of($table) -> addColumn('action', function($table){ //Ira criar a tabela e a coluna action com os botoes de crud
            return '<a  onclick="delPanelist('.$table -> idPalestrante.')" class="ui red right floated icon button acoes"><i class="trash icon" ></i></a>'.
            '<a  onclick="editGetPanelist('.$table -> idPalestrante.')" class="ui yellow right floated icon button acoes"><i class="edit icon" ></i></a>'.
            '<a  onclick="statusPanelist('. $table -> idPalestrante .')" class="ui gren right floated icon button acoes"><i class="eye icon" ></i></a>';
        }) -> make(true);
    }

    public function requestEventAct(){
        $array = [];
        
        $sqlEvent = DB::table('evento') -> select('idEvento','nome','data') -> where('status', 1) -> get();
        $array['event'] = $sqlEvent;
        
        $sqlAction = DB::table('atuacao') -> select('idAtuacao','nome') -> get();
        $array['action'] = $sqlAction;

        return response() -> json($array);
    }

    public function registerPanelist(Request $request){
        //dd($request);
        if($request -> nomePanelist != null and $request -> nomePanelist != ''){
            $dataFromPanelist = array(
                "nome" => $request -> nomePanelist,
                "cargo" => $request -> cargo,
                "email" => $request -> email,
                "telefone" => $request -> telefone,
                "sexo" => $request -> sexo,
                "idEvento" => $request -> nomeEvento,
                "horas" => $request -> horas,
                "nomeTema" => $request -> tema,
                "idAction" => $request -> action,
            );
        }

        $registerPanelist = PanelistModel::create([
            "nome" => $dataFromPanelist['nome'],
            "cargo" => $dataFromPanelist['cargo'],
            "email" => $dataFromPanelist['email'],
            "telefone" => $dataFromPanelist['telefone'],
            "sexo" => $dataFromPanelist['sexo'],
        ]) -> idPalestrante; //Pega o valor do Id do palestrante apos o cadastro. ou seja a variavel possui apenas o id do registro atualmente

        for ($i = 0; $i < count($request -> nomeEvento); $i++) {
            $registerTema = TemaModel::create([
                "nomeTema" => $dataFromPanelist['nomeTema'][$i],
                "horas" => $dataFromPanelist['horas'][$i],
                "idEventoFK" => $dataFromPanelist['idEvento'][$i],
                "idPalestranteFK" => $registerPanelist,
                "idActionFK" => $dataFromPanelist['idAction'][$i]
            ]);
        }

        return response() -> json($request);
    }
}

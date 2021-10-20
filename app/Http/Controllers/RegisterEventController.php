<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventModel;
use DateTime;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RegisterEventController extends Controller{
    
    public function registerEvent(Request $request) {
        if($request -> dateEvent != ''){
            $dataMySqlEvent = DateTime::createFromFormat('d/m/Y', $request -> dateEvent);
            $dataMySqlEvent->format('Y-m-d');
        }
        
        $validate = $request -> validate([
            'nameEvent' => 'required',
            'dateEvent' => 'required',
        ]);

        $registerData = EventModel::create([ //Registra o dado no banco de dados (coluna -> requisicaçao(apontando para o name))
            'nome' => $request -> nameEvent,
            'data' => $dataMySqlEvent,
        ]);

        return response() -> json($request); //Retorna a requisição
        
        //dd é como um vardump e quem estiver a baixo dele não será executado.
    }

    public function recoveryDataBase(){ //Retorna os dados da tabela de eventos
        $table = DB::select('select idEvento, nome, data, status from evento where status = 1');

        return DataTables::of($table) -> addColumn('action', function($table){ //Ira criar a tabela e a coluna action com os botoes de crud
            return '<a  onclick="delEvent('.$table -> idEvento.')" class="ui red right floated icon button acoes"><i class="trash icon" ></i></a>'.
            '<a  onclick="editGetEvent('.$table -> idEvento.')" class="ui yellow right floated icon button acoes"><i class="edit icon" ></i></a>'.
            '<a  onclick="statusEvent('. $table -> idEvento .')" class="ui gren right floated icon button acoes"><i class="eye icon" ></i></a>';
        }) -> make(true);

    }

    public function delEvent(Request $request){
        $update = EventModel::where('idEvento', $request -> idEvento) -> update(['status' => 0]);
        return response() -> json($update);
    }

    public function getDataEvent(Request $request){
        $getDataEvent = EventModel::where('idEvento', $request -> idEvento) -> select("nome","data") -> get();
        return response() -> json($getDataEvent);
    }

    public function setDataEvent(Request $request){
        if($request -> dateEvent != ''){
            $dataMySqlEvent = DateTime::createFromFormat('d/m/Y', $request -> dateEvent);
            $dataMySqlEvent->format('Y-m-d');
        }
        
        $validate = $request -> validate([
            'nameEvent' => 'required',
            'dateEvent' => 'required',
        ]);

        $setDataEvent = EventModel::where('idEvento', $request -> idEvento) -> update([
            'nome' => $request -> nameEvent,
            'data' => $dataMySqlEvent,
        ]);

        return response() -> json($request);
    }

}

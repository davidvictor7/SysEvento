$.ajaxSetup({ //Token deve ser enviado assim que a pagina é carregada pq o datatable não consegue fazer a requisição
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $("#newPanelist").on("click", function(){
        $("#eventosAll").empty(); //Limpa a div selecionada
        $(".actions").html('<button class="ui black deny button" type="button">Cancelar</button><button id="btnRegisterPanelist" class="ui green right labeled icon button" type="button" onclick="registerPanelist()">Cadastrar<i class="play icon"></i></button>');
        $('#formEvent').form('clear'); //reseta os dados do modal
        requestEventAct();
        $("#modalCadastro").modal('show');
        
        addEvento();
    });
    $('.ui.dropdown').dropdown();
    moment.locale('pt-br');
    showPanelists();
});

//Variavel global responsavel por pegar eventos e açoes
var htmlevent = [];

function showPanelists(){
    //Criando tabela via DataTables
    table = $("#tablePanelist").DataTable({
        processing: true,
        searching: true,
        serverSide: true,
        bLengthChange: false,
        bInfo: false,
        //Rota para onde os dados será mandado.
        ajax: "/showPanelist",
        //Informando quais dados vão ser listado 
        columns: [
          { data: 'nome'},
          { data: 'cargo'},
          { data: 'email'},
          { data: 'sexo'},
          { data: 'telefone'},
          { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
        //Traduzindo a Tabela para o PORTUGUÊS
        "bJQueryUI": true,
        "oLanguage": {
          "lengthChange": false,
          "pageLength": 10,
          "sProcessing": "Processando...",
          "sLengthMenu": "Mostrar MENU registros",
          "sZeroRecords": "Não foram encontrados resultados",
          "sInfo": "Mostrando de START até END de TOTAL registros",
          "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
          "sInfoFiltered": "",
          "sInfoPostFix": "",
          "sSearch": "Pesquisar: ",
          "sUrl": "",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Próximo",
            "sLast": "Último"
          }
        }
      });
      return table;
}

function requestEventAct(){
    $.ajax({
        type: "GET",
        url: "/requestEventAct",
        dataType: "JSON",
        success: function(response){
            events = response.event;
            action = response.action;
            //For each para os eventos
            $.each(response.event, function (indexInArray, valueOfElement) { 
                htmlevent+='<option value="'+valueOfElement.idEvento+'">'+valueOfElement.nome+' - '+moment(valueOfElement.data).format('L')+'</option>';
            });
            $("#selectEvent1").append(htmlevent);
            htmlevent = [];
            $.each(response.action, function (indexInArray, valueOfElement) { 
                htmlevent+='<option value="'+valueOfElement.idAtuacao+'">'+valueOfElement.nome+'</option>';
            });
            $("#acting1").append(htmlevent);
        },
        error: function(response){
            console.log("deu ruim");
        }
    });
}

var countEvento = $(".evento").length;
var events = [];
var action = [];

function addEvento() {
    //Fazendo usando o operador '++' para ingrementação para referenciar ao IDs para serem unicos
    countEvento = ++countEvento;
    var eventsOptions = '';
    var actionOptions = '';
    
    $.each(events, function (indexInArray, valueOfElement) { 
         eventsOptions += '<option value="'+valueOfElement.idEvento+'">'+valueOfElement.nome+' - '+moment(valueOfElement.data).format('L')+'</option>';
    });
    $.each(action, function (indexInArray, valueOfElementac) { 
        actionOptions += '<option value="'+valueOfElementac.idAtuacao+'">'+valueOfElementac.nome+'</option>';
   });


    add = '<div class="evento'+countEvento+'"><div class="ui divider"></div><div class="fields events" data-chave="'+countEvento+'"><div class="fourteen wide field"><label>Evento</label><select name="nomeEvento[]" class="ui fluid dropdown evento" id="selectEvent'+countEvento+'"><option class="changeColor"  value="">Nome do Evento</option>'+eventsOptions+'</select></div><div class="two wide field"><label>Carga Horária</label><input type="text" name="horas[]" placeholder="02 (Horas)" id="cargaHoraria'+countEvento+'"></div></div><div class="two fields"><div class="field tema2 tema"><label>Tema</label><input type="text" name="tema[]" placeholder="Tema do Evento" id="tema'+countEvento+'"></div><div class="field"><label>Atuação</label><select class="ui fluid dropdown" name="action[]" id="acting'+countEvento+'"><option class="changeColor" value="">Selecione uma atuação</option>'+actionOptions+'</select></div></div></div>';
    //criando o html
    $("#eventosAll").append(add);
    $('.ui.dropdown').dropdown();
}

function delEvento() {
    $(".evento"+countEvento).hide();
    if(countEvento > 1) {
        countEvento--;
    }
}

function registerPanelist() {
    var formNew = new FormData($("#formPanelist")[0]);
    $.ajax({
        type: "POST",
        url: "/registerPanelist",
        data: formNew,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(response){
            console.log("Deu bom!");
        },
        error: function(response){
            console.log("Deu ruim");
        }
    });
}
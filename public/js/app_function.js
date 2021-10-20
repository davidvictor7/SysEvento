/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var page = "controller/controller.php";
var table = $('#tabela_datable').DataTable();

function attTable(data){
    table.destroy();
    $("#tbody").html(data);
    table = $('#tabela_datable').DataTable({
        "lengthChange": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
}

function showEvent() {
    $.ajax({
        url: page,
        type: 'POST',
        data: {
            action: "mostrarEvento"
        },
        success: function (data) {
            table.destroy();
            $("#tbody").html(data);
            table = $('#tabela_datable').DataTable({
                "lengthChange": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });

            $(".delEvent").click(function () {
                var valorId = $(this).attr("id");
                swal({
                    title: 'Você confirma esta operação?',
                    text: "Essa operação não poderá ser revestida!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, eu desejo!'
                }).then((result) => {
                    if (result.value) {
                    if (deleteEvent(valorId)) {
                        swal(
                            'Apagado!',
                            'Esse dado foi removido com sucesso.',
                            'success'
                        )
                        showEvent();
                    }
                }
            });
            });
        }
    });
}


function deleteEvent(valorId) {
    var boolean = true;
    $.ajax({
        type: 'POST',
        url: page,
        async: false,
        data: {
            action: "deleteEvent",
            idEvento: valorId
        }, success: function (data, textStatus, jqXHR) {
            boolean = true;
        }
    });
    return boolean;
}

//Palestrante
function showPalestrante() {
    $.ajax({
        url: page,
        type: 'POST',
        data: {
            action: "mostrarPalestrante"
        },
        success: function (data) {
            table.destroy();
            $("#tbody").html(data);
            table = $('#tabela_datable').DataTable({
                "lengthChange": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });

            $(".delPalestrante").click(function () {
                var valorId = $(this).attr("id");
                swal({
                    title: 'Você confirma esta operação?',
                    text: "Essa operação não poderá ser revestida!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, eu desejo!'
                }).then((result) => {
                    if (result.value) {
                        if (deletePalestrante(valorId)) {
                            swal(
                                'Apagado!',
                                'Esse dado foi removido com sucesso.',
                                'success'
                            )
                            showPalestrante();
                        }
                    }
                });
            });
        }
    });
}

//viewEvento
function eventoPalestrante() {
    $.ajax({
        url: page,
        type: 'POST',
        data: {
            action: "eventoPalestrante"
        },
        success: function (data) {
            table.destroy();
            $("#tbodyModal").html(data);
            table = $('#tabela_datable').DataTable({
                "lengthChange": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });
        }
    });
}

function deletePalestrante(valorId) {
    var boolean = true;
    $.ajax({
        type: 'POST',
        url: page,
        async: false,
        data: {
            action: "deletePalestrante",
            idPalestrante: valorId,
        }, success: function (data, textStatus, jqXHR) {
            boolean = true;
        }
    });
    return boolean;
}

//##################### MASCARA DA DATA ########################################
function mascaraData(data,id) {
    verificaNum(id);
    var mdata = "";
    mdata = mdata + data;
    var quantidade = $(id).val().length;
    if(quantidade == 2) {
        mdata = mdata + "/";
        $(id).val(mdata);
    }
    if(quantidade == 5) {
        mdata = mdata + "/";
        $(id).val(mdata);
    }
    if(quantidade == 10){
        verificaData(id);
    }
    if(quantidade >= 11) {
        $(id).val($(id).val().substring(0,10));
    }
}
function verificaData(id) {
    var dia = $(id).val().substring(0,2);
    var mes = $(id).val().substring(3,5);
    var ano = $(id).val().substring(6,10);
    var conte = $(id).val();
    var situacao= "";
    // verifica o dia valido para cada mês
    if((dia < 1)||(dia < 01 || dia > 31)) {
        situacao = 'Dia deve ser entre 1 e 31.';
        var altera = "  /"+mes+"/"+ano;
    }

    if(mes == 02 || mes == 04 || mes == 06 || mes == 09 || mes == 11) {
        if(dia > 30) {
            situacao = 'No mês selecionado não tem dia 31.';
            var altera = "30/"+mes+"/"+ano;
        }
    }

    // verifica se é ano bissexto
    if((((ano % 4) == 0 && (ano % 100)!=0) || (ano % 400)==0)) {
        if(mes == 02 && dia > 29) {
            situacao = "O mês de fevereiro vai no máximo 29 dias.";
            var altera = "29/"+mes+"/"+ano;
        }
    }else {
        if(mes == 02 && dia > 28) {
            situacao = "Esse ano não é um ano bissexto";
            var altera = "28/"+mes+"/"+ano;
        }
    }

    // verifica se o mês é valido
    if(mes < 01 || mes > 12) {
        situacao = 'Mês é de 01 à 12.';
        var altera = dia+"/12"+"/"+ano;
    }

    //verifica conteudo
    if(conte == '') {
        situacao = 'Não existe data.';
    }

    //alerta dos erros
    if(situacao != '') {
        $(id).val(altera);
        alert(situacao);
        $(id).focus();
    }
}

function verificaNum(id) {
    $(id).keyup(function(e) {
        var quantidade = $(id).val().lenght;
        var tecla = e.which;
        if((tecla < 48 || tecla > 57) && (tecla < 96 || tecla > 105)) {
            var novaquantidade = quantidade - 1;
            var texto = $(id).val().substring(0,novaquantidade);
            $(id).val(texto);
        }
    });
}
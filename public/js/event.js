    $.ajaxSetup({ //Token deve ser enviado assim que a pagina é carregada pq o datatable não consegue fazer a requisição
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = null;

    $(document).ready(function(){
        $("#newEvent").on("click", function () {
            $(".actions").html('<button class="ui black deny button" type="button">Cancelar</button><button id="btnRegisterEvent" class="ui green right labeled icon button" type="button" onclick="registerEvent()">Cadastrar<i class="play icon"></i></button>');
            $('#formEvent').form('clear'); //reseta os dados do modal
            $("#modalCadastro").modal('show');
        });
        showEvents();
        moment.locale('pt-br');
    });

    function registerEvent(){
        var formNew = new FormData($("#formEvent")[0]);
        $.ajax({
            type: "POST",
            url: "registerEvent",
            data: formNew,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function (response) {
                $("#modalCadastro").modal("hide");
                $('#tableEvent').DataTable().ajax.reload();
            },
            error: function (response){
                var errorJson = response.responseJSON.errors;
                $.each(errorJson, function (indexInArray, valueOfElement) { 
                    
                    $("."+indexInArray).text(valueOfElement);
                    $("#"+indexInArray).addClass("error");
                    $("."+indexInArray).removeClass("hidden");
                });

                $("#formEvent div > div").focusin(function (e) { 
                    $(this).removeClass("error");
                    //console.log($(this).attr("id"));
                    var groupId = $(this).attr("id");
                    $("."+groupId).addClass("hidden");
                });
            }
        });
    }

    //Os eventos
    function showEvents() {
        //Criando tabela via DataTables
        table = $("#tableEvent").DataTable({
            processing: true,
            searching: true,
            serverSide: true,
            bLengthChange: false,
            bInfo: false,
            //Rota para onde os dados será mandado.
            ajax: "/showEvent",
            //Informando quais dados vão ser listado 
            columns: [
              { data: 'nome'},
              {data: 
                'data' ,
                "fnCreatedCell" : function  ( nTd ,  sData ,  oData ,  iRow ,  iCol )  {
                    $(nTd).html(moment(oData.data).format('L'));
                }
              },
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

    function delEvent(idEvento){
        
        Swal.fire({
            title: 'Você deseja realmente excluir?',
            text: "Você não poderá reverter a exclusão",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "delEvent",
                    data: {
                        idEvento
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:"JSON",
                    success: function(response){
                        $('#tableEvent').DataTable().ajax.reload();
                        Swal.fire(
                            'Deletado!',
                            'Seu Evento foi deletado!',
                            'success'
                          )
                    },
                    error: function(response){
                        Swal.fire(
                            'Não foi deletado!',
                            'Houve algum erro ao tentar deletar seu evento!',
                            'error'
                          )
                    } 
                });
            }
          });
    }

    //Pegar os dados do evento e colocar na modal.
    function editGetEvent(idEvento){
        $.ajax({
            type: "POST",
            url: "getDataEvent",
            data: {
                idEvento
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "JSON",
            success: function(response){
                $(".actions").html('<button class="ui black deny button" type="button">Cancelar</button><button id="btnRegisterEvent" class="ui green right labeled icon button" type="button" onclick="editSetEvent('+idEvento+')">Cadastrar<i class="play icon"></i></button>');
                var formatData = moment(response[0].data).format('L');
                $("#nome").val(response[0].nome);
                $("#alvo").val(formatData);
                $("#modalCadastro").modal("show");
            },
            error: function(response){
                console.log("Deu ruim!");
            }

        });
    }

    function editSetEvent(idEvento){
        var formDataEvent = new FormData($("#formEvent")[0]);
        formDataEvent.append("idEvento", idEvento);
        $.ajax({
            type: "POST",
            url: "setDataEvent",
            data: formDataEvent,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(response){
                $("#modalCadastro").modal("hide");
                $('#tableEvent').DataTable().ajax.reload();
            },
            error: function(response){
                var errorJson = response.responseJSON.errors;
                $.each(errorJson, function (indexInArray, valueOfElement) { 
                    
                    $("."+indexInArray).text(valueOfElement);
                    $("#"+indexInArray).addClass("error");
                    $("."+indexInArray).removeClass("hidden");
                });

                $("#formEvent div > div").focusin(function (e) { 
                    $(this).removeClass("error");
                    var groupId = $(this).attr("id");
                    $("."+groupId).addClass("hidden");
                });
            }

        });
    }

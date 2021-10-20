<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Histórico de Talentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/dataTables.semanticui.min.css"/>
    <link href="img/mp.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" type="text/css" href="css/app.css"/>


    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/semantic.min.js" ></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.semanticui.min.js"></script>
    <script type="text/javascript" src="js/app.js" ></script>
    <script type="text/javascript" src="js/app_function.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js" ></script>
    <script>
        function openModal(janela, attr) {
            var html = "";
            switch (janela) {
                case "editEvento":
                    $("#modalCadastro").load("modals/editEvento.php");
                    editarEvento(attr);
                    $("#modalCadastro").modal("show");
                    break;
                case "addPalestrante":
                    html = "";
                    $("#modalCadastro").load("modals/addPalestrante.php");
                    $("#modalCadastro").modal("show");
                    break;
                case "addEvento":
                    $("#modalCadastro").load("modals/addEvento.php");
                    $("#modalCadastro").modal("show");
                    break;
                case "viewEvent":
                    $("#modalCadastro").load("modals/viewEvento.php");
                    viewEvento(attr);
                    $("#modalCadastro").modal("show");
                default:
            }
            $("#modalCadastro").html(html);
            $("#modalCadastro").modal("show");
        }

        var page = "controller/controller.php";

        function editarEvento(attr) {
            $.ajax({
                url: page,
                type: 'POST',
                data: {
                    action: "editEventos",
                    id: attr
                },
                success: function (data) {
                    var quebraArray = $.parseJSON(data); //transforma string em array
                    $(".btnCadastrar").attr("id",attr);
                    $("#nome").val(quebraArray.nome);
                    $("#alvo").val(quebraArray.datas);
                }
            });
        }

        function viewEvento(attr) {
            $.ajax({
                url: page,
                type: 'POST',
                data: {
                    action: "viewEventos",
                    id: attr
                },
                success: function (data) {
                    var quebraArray = $.parseJSON(data);
                    //$("#titulo").html(quebraArray.nome+" - "+quebraArray.datas);
                    $("#tbodyModal").html(quebraArray);

                    //$("#jk").attr('value',attr)
                }
            });
        }

        function editarTimeline(attr) {
            $.ajax({
                url: page,
                type: 'POST',
                data: {
                    action: "editTimeline",
                    id: attr
                },
                success: function (data) {
                    var quebraArray = $.parseJSON(data); //transforma string em array
                    $(".btnCadastrar").attr("id",attr);
                    $(".periodo").val(quebraArray.periodo);
                    $(".titulo").val(quebraArray.titulo);
                    $(".textArea").val(quebraArray.descricao);
                    $(".upImage").attr('src',quebraArray.imagem);
                    //console.log(quebraArray.imagem);
                }
            });
        }
    </script>
</head>
<body>
<div class="ui container fluid">
    <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow-x:  auto !important;" id="sibebarMaior">
        <div class="item logo">
            <i class="openbtn icon content" id="btnDevices"></i>
            <img src="img/logo.png" />
        </div>
        <div class="ui accordion" id="accordionSidebar">
            <div class="title activeAccordion" id="Palestrante">
                <p class="pContent"><i class="users icon"></i><span>Palestrantes</span></p>
            </div>

            <div class="title" id="eventos">
                <p class="pContent"><i class="calendar check icon"></i><span>Eventos</span></p>
            </div>

            <div class="title" id="relatorios">
                <p class="pContent"><i class="clipboard icon"></i><span>Relatórios</span></p>
            </div>
        </div>
        <div class="iconsSidebarFix">
            <div class="ui dropdown item displaynone iconShort">
                <i class="users icon" id="Palestrante"></i>
            </div>
            <div class="ui dropdown item displaynone iconShort">
                <i class="calendar check icon" id="eventos"></i>
            </div>
            <div class="ui dropdown item displaynone iconShort">
                <i class="clipboard icon active" id="relatorios"></i>
            </div>
        </div>
    </div>

    <div class="pusher">
        <div class="ui menu asd borderless">
            <div class="left menu" id="leftMenuToMobile">
                <div class="iconSibebar">
                    <i class="icon content" id="iconSidebarMobile"></i>
                </div>
            </div>
            <div class="right menu" id="iconsAndInformationsUser">
                <div class="iconsAccount">
                    <img class="ui avatar image openDivNone" id="informationsUser" src="img/user.jpg" style="cursor: pointer;">
                    <div class="arrow displaynone" id="informationsUser"></div>
                    <div class="divMae" id="informationsUser">
                        <!--<div class="gb_tb"></div>-->
                        <!--<div class="gb_sb"></div>-->
                        <div class="ui cards">
                            <div class="card" id="cardUser">
                                <div class="content">
                                    <div class="header">
                                        Seja Bem Vindo, Richardson
                                    </div>
                                    <div class="meta">
                                        Administrador
                                    </div>
                                    <div class="description">
                                        Último acesso: 15/03/2019 10:50:23 <br/>Sessão: 05:31
                                    </div>
                                </div>
                                <div class="extra content">
                                    <div class="ui two buttons">
                                        <div class="ui button">Conta</div>
                                        <div class="ui red button">Sair</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui form standard large modal scrolling transition hidden" id="modalCadastro"></div>
        <div class="ui form standard longer modal scrolling transition hidden" id="edit"></div>
        <div class="ui form standard longer modal scrolling transition hidden" id="remove"></div>
        <div class="teste" id="centralScreen">
            <?php
            include "telas/Palestrante.php";
            ?>
        </div>
    </div>
</div>
</body>
</html>

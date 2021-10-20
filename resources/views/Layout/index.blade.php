<!DOCTYPE html>
<html>
<head>
    <title>Histórico de Talentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{--Gera um token para cada usuario que estiver na aplicação--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.semanticui.min.css') }}"/>
    <link href="{{ asset('img/mp.png') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>

</head>
<body>
<div class="ui container fluid">
    <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow-x:  auto !important;" id="sibebarMaior">
        <div class="item logo">
            <i class="openbtn icon content" id="btnDevices"></i>
            <img src="img/logo.png" />
        </div>
        <div class="ui accordion" id="accordionSidebar">
            <div class="title activeAccordion activeRoute" id="panelist">
                <p class="pContent"><i class="users icon"></i><span>Palestrantes</span></p>
            </div>

            <div class="title activeRoute" id="event">
                <p class="pContent" data-route="event"><i class="calendar check icon"></i><span>Eventos</span></p>
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
        <div class="ui segment loadnone loadactive" style="position: inherit;">
            <div class="ui active dimmer">
              <div class="ui text loader">Loading</div>
            </div>
            <p></p>
        </div>
        <div class="teste">
            @yield('content')
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> {{--O asset faz com que ele saiba que existe a pasta public--}}
<script type="text/javascript" src="{{ asset('js/semantic.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.semanticui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app_function.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/moment.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('js/moment-locales.min.js') }}" ></script>
@yield('js')

</body>
</html>
<div class="ui container containerPrincipal segment" id="containerToInformations" style="">
    <div class="ui secondary menu">
        <div class="left menu">
            <h1 class="ui header">
                <i class="calendar check icon"></i>Eventos
            </h1>
        </div>
        <div class="right menu">
            <button id="newEvent" class="ui teal icon button">Novo</button>
        </div>
    </div>

    <div class="ui divider"></div>
    <div class="ui form">
    </div>
    <table class="ui green table" id="tableEvent">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>

@include('modalEvent')
<script src="../../js/event.js"></script>

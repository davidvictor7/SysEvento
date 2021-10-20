
<div class="ui container containerPrincipal segment" id="containerToInformations" style="">
    <div class="ui secondary menu">
        <div class="left menu">
            <h1 class="ui header">
                <i class="users check icon"></i>Palestrantes
            </h1>
        </div>
        <div class="right menu">
            <button id="newPanelist" class="ui teal icon button">Novo</button>
        </div>
    </div>

    <div class="ui divider"></div>
    <div class="ui form">
    </div>
    <table class="ui green table" id="tablePanelist">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Telefone</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
@include('modalPanelist')
<script src="../../js/panelist.js"></script>

<div class="ui container containerPrincipal segment" id="containerToInformations" style="">
    <div class="ui secondary menu">
        <div class="left menu">
            <h1 class="ui header">
                <i class="users icon"></i>Palestrantes
            </h1>
        </div>
        <div class="right menu">
            <button onclick="openModal('addPalestrante');" class="ui teal icon button">Novo</button>
        </div>
    </div>

    <div class="ui divider"></div>
    <div class="ui form">
    </div>
    <table class="ui green table" id="tabela_datable">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ação</th>

        </tr>
        </thead>
        <tbody id="tbody">
            <tr>
                <td>David Victor Cavalcante</td>
                <td>Masculino</td>
                <td>Estagiário</td>
                <td>Estagiário@gmail.com</td>
                <td>0000000000</td>
                <td><a class='ui tiny green icon button'><i class="eye icon"></i></a><a class='ui tiny yellow icon button'><i class='pencil icon'></i></a> <a class='ui tiny red icon button delTimeline' id=""><i class='trash icon'></i></a> <a class='ui tiny blue icon button delTimeline' id=""><i class='download icon'></i></a></td>
            </tr>
        </tbody>
    </table>

</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>

    $(document).ready(function () {

        function showDataToSelect() {
            $.ajax({
                url: page,
                type: 'POST',
                data: {
                    action: "showDataToSelect"
                },
                success: function (data) {
                    $("#filtro_pesquisa").html(data);
                }
            });
        }

        function getDataSelected(word) {
            $.ajax({
                type: 'POST',
                url: page,
                data: {
                    action: "getDataSelectedAction",
                    palavra: word,
                },
                success: function (data) {
                    $("#tbody").html(data);
                }
            });
        }

        function getDataDate(Date) {
            $.ajax({
                type: 'POST',
                url: page,
                data: {
                    action: "getDataDate",
                    palavra: Date,
                },
                success: function (data) {
                    $("#tbody").html(data);
                }
            });
        }

        $("#Search").click(function () {
            var typed = $("#pesquisa_timeline").val();
            getDataSelected(typed);
        });

        $("#pesquisa_timeline").keyup(function (e) {
            if(e.keyCode == 13){
                $("#Search").trigger('click');
            }
        });

        $("#filtro_pesquisa").change(function () {
            var data = $(this).val();
            getDataDate(data);
        });

        $("#script_registro").remove();
        showPalestrante();
        showDataToSelect();
    });
</script>
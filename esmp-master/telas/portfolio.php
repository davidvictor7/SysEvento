<div class="ui container containerPrincipal segment" id="containerToInformations" style="">
    <div class="ui secondary menu">
        <div class="left menu">
            <h1 class="ui header">
                <i class="images icon"></i>Portifólio
            </h1>
        </div>
        <div class="right menu">
            <button onclick="openModal('addPortfolio');" class="ui teal icon button">Novo</button>
        </div>
    </div>

    <div class="ui divider"></div>
    <div class="ui form">
    </div>
    <table class="ui green table" id="tabela_datable">
        <thead>
        <tr>
            <th>Título</th>
            <th>Subtitulo</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Descricao</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>

</div>

<script type="text/javascript" src="js/app_function.js"></script>
<script>
555
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
        showPortfolio();
        showDataToSelect();
    });
</script>
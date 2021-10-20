<div class="header"><i class="phone volume icon"></i>Editar Atendimento</div>
<div class="content">
    <div class="field">
        <div class="ui equal width grid">
            <div class="equal width row">
                <div class="column" >
                    <div class="ui form">
                        <div class="field">
                            <label>Nome do Sistema</label>
                            <input class="nomeAtendimento" disabled type="text">
                        </div>
                    </div>
                    <div class="ui dividing header"></div>
                    <div class="ui form">
                        <div class="field">
                            <label>Quantidade</label>
                            <input class="quantidade" type="number" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="actions">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div id="" class="ui positive right labeled icon button btnCadastrarA" onclick="alterarAtendimento()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>
    function alterarAtendimento() {
        var idAtendimento = $(".btnCadastrarA").attr('id');
        var nomeAtendimento = $(".nomeAtendimento").val();
        var quantidade = $(".quantidade").val();

        $.ajax({
            type: 'POST',
            url: page,
            data: {
                action: "toAlterAttendance",
                id: idAtendimento,
                nomeAtendimento: nomeAtendimento,
                qtd: quantidade,
            },
            success: function (data) {
                $("#tbody").html(data);
                showAttendance();
            }
        });
    }
</script>
<div class="header"><i class="question icon"></i>Editar Pergunta</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="form">
        <div class="ui huge field">
            <div class="field">
                <label>Pergunta</label>
                <input class="pergunta" placeholder="Digite a pergunta aqui" type="text">
            </div>
            <div class="field">
                <label>Resposta</label>
                <input class="resposta" placeholder="Digite a resposta aqui" type="text">
            </div>
        </div>
    </form>
</div>
<div class="actions">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div class="ui positive right labeled icon button btnCadastrarF" onclick="alterarFac()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>
    function alterarFac() {
        var idFac = $(".btnCadastrarF").attr('id');
        var pergunta = $(".pergunta").val();
        var resposta = $(".resposta").val();

        $.ajax({
            type: 'POST',
            url: page,
            data: {
                action: "toAlterFac",
                id: idFac,
                pergunta: pergunta,
                resposta: resposta,
            },
            success: function (data) {
                $("#tbody").html(data);
                showFac();
            }
        });
    }
</script>
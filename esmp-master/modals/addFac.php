<div class="header"><i class="question icon"></i>Cadastrar Pergunta</div>
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
    <div id="" class="ui positive right labeled icon button" onclick="cadastrarPergunta()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>
    var page = "controller/controller.php";

    function cadastrarPergunta() {
        var pergunta = $(".pergunta").val();
        var resposta = $(".resposta").val();

        $.ajax({
            type: 'POST',
            url: page,
            data: {
                action: "toRegisterFac",
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

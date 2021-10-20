<div class="header"><i class="calendar check icon"></i>Editar Evento</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formAlter">
        <div class="two fields">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nomeEvento" placeholder="Nome do Evento" id="nome">
            </div>
            <div class="field">
                <label>Data</label>
                <!--                <input type="text" name="shipping[first-name]" placeholder="Selecione a data do evento" onkeypress="mascaraData(this)">-->
                <div class="ui calendar" id="example2">
                    <div class="ui input left icon">
                        <i class="calendar alternate icon"></i>
                        <input type="text" name="dataEvento" placeholder="DD/MM/AAAA" onkeyup="mascaraData(this.value,'#alvo')" value="" maxlength="10" id="alvo"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="actions">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div id="" class="ui positive right labeled icon button btnCadastrar" onclick="alterarEvento()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>

<script>

    function alterarEvento() {

        var id = $(".btnCadastrar").attr('id');
        var form = $('#formAlter')[0];
        var formData = new FormData(form);
        formData.append("action","alterEvent");
        formData.append("id",id);

        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            contentType: false,
            cache: false,
            async: false,
            processData: false,
            success: function (data) {
                showEvent();
            }
        });
    }

    function verificaMostraBotao(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                readURL(this);
                $('.addImage').show();
            }
        });
    }

    $('.addImage').on("click", function(){
        $("#formAlter").append($('<input />', {type: "file", id: 'file', name: 'file' }).change(verificaMostraBotao));
        $("#file").trigger('click');
    });

</script>
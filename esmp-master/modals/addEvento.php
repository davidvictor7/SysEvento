
<div class="header"><i class="calendar check icon"></i>Cadastrar Evento</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formEvent">
        <div class="two fields">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="shipping[first-name]" placeholder="Nome do Evento" id="nome">
            </div>
            <div class="field">
                <label>Data</label>
<!--                <input type="text" name="shipping[first-name]" placeholder="Selecione a data do evento" onkeypress="mascaraData(this)">-->
                <div class="ui calendar" id="example2">
                    <div class="ui input left icon">
                        <i class="calendar alternate icon"></i>
                        <input type="text" name="" placeholder="DD/MM/AAAA" onkeyup="mascaraData(this.value,'#alvo')" id="alvo" value="" maxlength="10"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="actions" style="text-align: right">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div id="" class="ui positive right labeled icon button" name="cadastrar" onclick="cadastrarEvento()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>
<script>
    function cadastrarEvento() {
        var nome = $("#nome").val();
        var dates = $("#alvo").val();

        $.ajax({
            type: 'POST',
            url: page,
            data: {
                action: "cadastrarEvento",
                nome: nome,
                dates: dates,
            },
            success: function (data) {
                $("#tbody").html(data);
                showEvent();
            }
        });
    }

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             $(".upImageTeam").attr("src",e.target.result);
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    //     else {
    //         var img = input.value;
    //         $(".upImageTeam").attr("src",img);
    //     }
    // }

    function verificaMostraBotao(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                readURL(this);
                $('.addImageTeam').show();
            }
        });
    }
</script>

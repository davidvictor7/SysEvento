<div class="header"><i class="calendar check icon"></i><span id="titulo"></span></div>
<div class="content">
    
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formAlter">
        
        <table class="ui green table" id="tabela_datable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Atuação</th>
                    <th>Carga Horária</th>
                </tr>
            </thead>
            <tbody id="tbodyModal">
                <tr>
                    <td>Natanel Dias</td>
                    <td>Masculino</td>
                    <td>Analista</td>
                    <td>teste@gmail.com</td>
                    <td>85988602140</td>
                    <td>Palestrante</td>
                    <td>26 Horas</td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="actions">
    <div id="jk" class="ui positive right labeled icon button btnCadastrar" onclick="alterarEvento()" value="">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>

<script>
    var teste;

    $(document).ready(function(){
        eventoPalestrante();
        //teste = $("#jk").attr("value");
        //console.log(teste);
    });


    function showEventoPales(idValue) {
        $.ajax({
            url: page,
            type: 'POST',
            data: {
                action: "eventoPalestrante",
                id: idValue,
            },
            success: function(data) {
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

</script>
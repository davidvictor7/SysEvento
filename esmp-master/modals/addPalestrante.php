<div class="header"><i class="users icon"></i> Adicionar Palestrante</div>
<div class="content scrolling">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formPalestrante">
        <div class="two fields">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome Completo" id="nome">
            </div>
            <div class="field">
                <label>Cargo</label>
                <input type="text" name="cargo" placeholder="Cargo ou Formação" id="cargo">
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Sexo</label>
                <select name="sexo"  id="sexo" class="ui fluid dropdown">
                    <option value="">Sexo</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>
            <div class="field">
                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="(DDD) 00000-0000" id="telefone">
            </div>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="text" name="email" placeholder="usuario@mail.com" id="email">
        </div>
<!--        ##################################################-->
        <div class="novosEventos">
            <h4 class="ui horizontal divider header">
                <i class="bar chart icon"></i>
                Eventos
            </h4>
            <div id="eventosAll">
                <div class="fields events" data-chave="1">
                    <div class="fourteen wide field">
                        <label>Evento</label>
                        <select name="nomeEvento" class="ui fluid dropdown evento" id="selectEvent1">
                            <option class="changeColor"  value="">Nome do Evento</option>
                        </select>
                    </div>
                    <div class="two wide field">
                        <label>Carga Horária</label>
                        <input type="text" name="horas" placeholder="02 (Horas)" id="cargaHoraria1">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field tema2 tema">
                        <label>Tema</label>
                        <input type="text" name="tema" placeholder="Tema do Evento" id="tema1">
                    </div>
                    <div class="field">
                        <label>Atuação</label>
                        <select class="ui fluid dropdown atuacao" class="atuacao1" name="atuacao" id="acting1">
                            <option class="changeColor" value="">Selecione uma atuação</option>
                        </select>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
    <div style="text-align: center;">
        <div id="" class="ui positive labeled icon button" style="margin-top: 2%;" onclick="addEvento()">
            Adicionar
            <i class="plus circle icon"></i>
        </div>
        <div id="" class="ui positive labeled deny icon button" style="margin-top: 2%;" onclick="delEvento()">
            Remover
            <i class="minus circle icon"></i>
        </div>
    </div>
</div>
<div class="actions">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div id="" class="ui positive right labeled icon button" name="cadastrar" onclick="cadastrarPalestrante()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>


<script>
    //variavel que vai armazenar o HTML
    var adicao = '';
    //Variavel que vai armazer as atuacoes
    var atuacao = '';
    //Variavel que vai armazer os eventos
    var events = '';
    $(document).ready(function() {
        showActing();
        showEvents();
    });

    function showActing() {
        $.ajax({
            url: page,
            type: 'POST',
            data: {
                action: "showActing"
            },
            success: function(data) {
                atuacao = data;
                $("#acting1").html(data);
            }
        });
    }

    function showEvents() {
        $.ajax({
            url: page,
            type: 'POST',
            data: {
                action: "showEvents"
            },
            success: function(data) {
                events = data;
                $("#selectEvent1").html(data);
            }
        });
    }
    //############################################
    function cadastrarPalestrante() {

        var array = [];

        $("#eventosAll div.events").each(function(){

            var id = $(this).attr('data-chave');
            var json = {};

            json.EVENTO = $("select#selectEvent"+id).val();
            json.HORARIO = $("input#cargaHoraria"+id).val();
            json.TEMA = $("input#tema"+id).val();
            json.ATUACAO = $("select#acting"+id).val();

            array.push(json);
            
        });

        var form = $('#formPalestrante')[0];
        var formData = new FormData(form);
        formData.append("action", "cadastrarPalestrante");
        formData.append("EVENTOS", JSON.stringify(array));

        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            contentType: false,
            cache: false,
            async: false,
            processData: false,
            success: function(data) {
                showPalestrante();
            }
        });
        
    }

    var countEvento = $(".evento").length;

    function addEvento() {
        //Fazendo usando o operador '++' para ingrementação para referenciar ao IDs para serem unicos
        countEvento = ++countEvento;
        
        adicao = '<div class="evento'+countEvento+'"><div class="ui divider"></div><div class="fields events" data-chave="'+countEvento+'"><div class="fourteen wide field"><label>Evento</label><select name="nomeEvento" class="ui fluid dropdown evento" id="selectEvent'+countEvento+'"><option class="changeColor"  value="">Nome do Evento</option>'+events+'</select></div><div class="two wide field"><label>Carga Horária</label><input type="text" name="horas" placeholder="02 (Horas)" id="cargaHoraria'+countEvento+'"></div></div><div class="two fields"><div class="field tema2 tema"><label>Tema</label><input type="text" name="tema" placeholder="Tema do Evento" id="tema'+countEvento+'"></div><div class="field"><label>Atuação</label><select class="ui fluid dropdown" name="atuacao" id="acting'+countEvento+'"><option class="changeColor" value="">Selecione uma atuação</option>'+atuacao+'</select></div></div></div>';
        //criando o html
        $("#eventosAll").append(adicao);

        $('.ui.dropdown').dropdown();
    }

    function delEvento() {
        $(".evento"+countEvento).hide();
        if(countEvento > 1) {
            countEvento--;
        }
    }

    $('.ui.dropdown').dropdown();

    function readURL(input) {
        //Chamando a função do SEMANTIC UI para não perder o style dos selects adicionados com o append;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".upImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            var img = input.value;
            $(".upImage").attr("src", img);
        }
    }

    function verificaMostraBotao() {
        $('input[type=file]').each(function(index) {
            if ($('input[type=file]').eq(index).val() != "") {
                readURL(this);
                $('.addImage').show();
            }
        });
    }


    $('.addImage').on("click", function() {
        $("#form").append($('<input />', {
            type: "file",
            id: 'file',
            name: 'file'
        }).change(verificaMostraBotao));
        $("#file").trigger('click');
    });
</script>

<div class="header"><i class="users icon"></i>Editar Pessoa</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formAlterTeam">
        <div class="field">
            <div class="ui equal width grid">

                <div class="equal width row">
                    <div class="column">
                        <!--                    <img onclick="$('#imagemTimeline').trigger('click');" class="ui medium circular image" src="img/addImagem.png" title="Adicionar Imagem"> <input type="file" id="imagemTimeline" style="display: none;">-->

                        <div class="ui cards">
                            <div class="card">
                                <div class="content">
                                    <img class="ui medium circular image upImageTeam" src="../../../land_page_informatica/src/img/about/3.jpg" title="Adicionar Imagem">
                                    <!--                                    <input type="file" id="imagemTimeline" style="display: block;">-->
                                </div>
                                <div class="ui bottom attached button addImageTeam">
                                    <i class="add icon"></i>
                                    Adicionar Imagem
                                </div>
                            </div>
                            <div style="margin: 0 auto; margin-top: -4px;"><p class="field required"  style="color: #8a8a8a; font-style: italic; font-size: 12.5px;">Tamanho Máximo de Imagem 500x500</p></div>
                        </div>

                    </div>
                    <div class="column" style="margin-top: 5%;">
                        <div class="ui form">
                            <div class="field">
                                <label>Nome</label>
                                <input type="text" rows="4" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="nome" class="nome">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Cargo</label>
                                <input type="text" rows="4" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="cargo" class="cargo">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>E-mail</label>
                                <input type="text" rows="4" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="email" class="email">
                            </div>
                        </div>
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
    <div id="" class="ui positive right labeled icon button btnCadastrarE" onclick="alterarEquipe()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>

    function alterarEquipe() {
        var formData = new FormData($('#formAlterTeam')[0]);
        var id = $(".btnCadastrarE").attr('id');
        var imagem = $('#file').prop('files');
        formData.append('action', 'toAlterTeam');
        formData.append('id', id);
        if(imagem != undefined){
            formData.append('image', $('#file').prop('files')[0]);
        }
        else{
            formData.append('imagePath', $(".upImageTeam").attr("src"));
        }
        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            success: function(data)
            {
                showTeam();
            },
            processData: false,
            cache: false,
            contentType: false
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(".upImageTeam").attr("src",e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        else {
            var img = input.value;
            $(".upImageTeam").attr("src",img);
        }
    }

    function verificaMostraBotao(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                readURL(this);
                $('.addImageTeam').show();
            }
        });
    }

    $('.addImageTeam').on("click", function(){
        $("#formAlterTeam").append($('<input />', {type: "file", id: 'file', name: 'file' }).change(verificaMostraBotao));
        $("#file").trigger('click');
    });
</script>

<div class="header"><i class="images icon"></i>Cadastrar Portfólio</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formPort">
        <div class="field">
            <div class="ui equal width grid">
                <div class="equal width row">
                    <div class="column">
                        <div class="ui cards">
                            <div class="card">
                                <div class="content">
                                    <img class="ui medium circular image upImagePort" src="../../../land_page_informatica/src/img/about/3.jpg" title="Adicionar Imagem">
                                </div>
                                <div class="ui bottom attached button addImagePort">
                                    <i class="add icon"></i>
                                    Adicionar Imagem
                                </div>
                            </div>
                            <div style="margin: 0 auto; margin-top: -4px;"><p class="field required"  style="color: #8a8a8a; font-style: italic; font-size: 12.5px;">Tamanho Máximo de Imagem 500x500</p></div>
                        </div>
                    </div>
                    <div class="column" style="margin-top: -1%;">
                        <div class="ui form">
                            <div class="field">
                                <label>Titulo</label>
                                <input type="text" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="titulo" id="titulo">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Subtitulo</label>
                                <input type="text" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="subtitulo" id="subtitulo">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Data</label>
                                <input type="text" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="data" id="data">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Cliente</label>
                                <input type="text" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" name="cliente" id="cliente">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui form">
                    <div class="field">
                        <label>Descrição</label>
                        <textarea rows="2" style="margin-top: 0px; margin-bottom: 0px; min-height: 96px;  max-height: 96px; width: 331%;" name="descricao" id="descricao"></textarea>
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
    <div id="" class="ui positive right labeled icon button" name="cadastrar" onclick="cadastrarPortfolio()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>
<script>

    function cadastrarPortfolio() {
        var formData = new FormData($('#formPort')[0]);
        formData.append('imagePort', $('#file').prop('files')[0]);
        formData.append('action', 'toRegisterPortfolio');

        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            success: function(response)
            {
                showPortfolio();
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
                $(".upImagePort").attr("src",e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        else {
            var img = input.value;
            $(".upImagePort").attr("src",img);
        }
    }

    function verificaMostraBotao(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                readURL(this);
                $('.addImagePort').show();
            }
        });
    }


    $('.addImagePort').on("click", function(){
        $("#formPort").append($('<input/>', {type: "file", id: 'file', name: 'file' }).change(verificaMostraBotao));
        $("#file").trigger('click');
    });
</script>

<div class="header"><i class="history icon"></i>Editar da Linha Do Tempo</div>
<div class="content">
    <form method="POST" action="../controller/controller.php" enctype="multipart/form-data" id="formAlter">
        <div class="field">
            <div class="ui equal width grid">
                <div class="equal width row">
                    <div class="column">
                            <div class="ui cards">
                                <div class="card">
                                    <div class="content">
                                        <img class="ui medium circular image upImage" src="../../../land_page_informatica/src/img/about/3.jpg" title="Adicionar Imagem">
                                    </div>
                                    <div class="ui bottom attached button addImage">
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
                                <label>Período</label>
                                <input class="periodo" type="text" name="periodo" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Título</label>
                                <input class="titulo" type="text" name="titulo" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;">
                            </div>
                        </div>
                        <div class="ui dividing header"></div>
                        <div class="ui form">
                            <div class="field">
                                <label>Descrição</label>
                                <textarea class="textArea" name="textArea" rows="2" style="margin-top: 0px; margin-bottom: 0px; min-height: 96px;  max-height: 96px;"></textarea>
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
    <div id="" class="ui positive right labeled icon button btnCadastrar" onclick="alterarTimeline()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script type="text/javascript" src="js/app_function.js"></script>
<script>


    function alterarTimeline() {
        var formData = new FormData($('#formAlter')[0]);
        var id = $(".btnCadastrar").attr('id');
        var imagem = $('#file').prop('files');
        formData.append('action', 'toAlterTimeline');
        formData.append('id', id);
        if(imagem != undefined){
            formData.append('image', $('#file').prop('files')[0]);
        }
        else{
            formData.append('imagePath', $(".upImage").attr("src"));
        }
        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            success: function(data)
            {
                // console.log(data);
                showData();
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
                $(".upImage").attr("src",e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        else {
            var img = input.value;
            $(".upImage").attr("src",img);
        }
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
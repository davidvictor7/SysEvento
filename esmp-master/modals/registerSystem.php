<div class="header"><i class="desktop icon"></i>Cadastrar Sistema</div>
<div class="content">
    <form method="POST" action="javascript:void(0);" id="formSystem">
        <div class="field">
            <div class="ui equal width grid">
                <div class="equal width row">
                    <div class="column">
                        <div class="ui cards">
                            <div class="card">
                                <div class="content contentImage">
                                    <img class="ui medium circular image upImageSystem" src="../../../land_page_informatica/src/img/about/3.jpg" title="Adicionar Imagem">
                                </div>
                                <div class="ui bottom attached button addImageSystem">
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
                                <label>Nome do Sistema</label>
                                <input class="nomeSistema" type="text" rows="2" name="nomeSistema" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;" id="nomeSistema">
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
    <div id="" class="ui positive right labeled icon button" name="cadastrar" onclick="cadastrarSistema()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>
<script type="text/javascript" src="js/app_function.js"></script>
<script>

    function cadastrarSistema() {
        var formData = new FormData($('#formSystem')[0]);
        formData.append('imageSistema', $('#file').prop('files')[0]);
        formData.append('action', 'toRegisterSystem');

        $.ajax({
            type: 'POST',
            url: page,
            data: formData,
            success: function(response)
            {
                showSystem();
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
                $(".upImageSystem").attr("src",e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
        else {
            var img = input.value;
            $(".upImageSystem").attr("src",img);
        }
    }

    function verificaMostraBotao(){
        $('input[type=file]').each(function(index){
            if ($('input[type=file]').eq(index).val() != ""){
                readURL(this);
                $('.addImageSystem').show();
            }
        });
    }


    $('.addImageSystem').on("click", function(){
        $("#formSystem").append($('<input />', {type: "file", id: 'file', name: 'file' }).change(verificaMostraBotao));
        $("#file").trigger('click');
    });

</script>

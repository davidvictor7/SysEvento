<div class="header"><i class="phone volume icon"></i>Cadastrar Atendimento</div>
<div class="content">
    <div class="field">
        <div class="ui equal width grid">
            <div class="equal width row">
                <div class="column">
                    <!--                    <img onclick="$('#imagemTimeline').trigger('click');" class="ui medium circular image" src="img/addImagem.png" title="Adicionar Imagem"> <input type="file" id="imagemTimeline" style="display: none;">-->
                    <div class="ui cards">
                        <div class="card">
                            <div class="content" style="text-align: center">
                                <img class="ui small circular image" src="../../../land_page_informatica/src/img/about/3.jpg" title="Adicionar Imagem"> <input type="file" id="imagemTimeline" style="display: none;">
                            </div>
                            <div onclick="$('#imagemTimeline').trigger('click');" class="ui bottom attached button">
                                <i class="add icon"></i>
                                Adicionar Imagem
                            </div>
                        </div>
                        <div style="margin: 0 auto; margin-top: -4px;"><p class="field required"  style="color: #8a8a8a; font-style: italic; font-size: 12.5px;">Tamanho Máximo de Imagem 500x500</p></div>
                    </div>
                </div>
                <div class="column" >
                    <div class="ui form">
                        <div class="field">
                            <label>Nome do Tipo de Atendimento</label>
                            <input class="nomeAtendimento" type="text" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;">
                        </div>
                    </div>
                    <div class="ui dividing header"></div>
                    <div class="ui form">
                        <div class="field">
                            <label>Quantidade</label>
                            <input class="quantidade" type="number" rows="2" style="margin-top: 0px; margin-bottom: 0px; max-height: 41px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="actions">
    <div class="ui black deny button">
        Cancelar
    </div>
    <div id="" class="ui positive right labeled icon button" onclick="cadastrarAtendimento()">
        Cadastrar
        <i class="play icon"></i>
    </div>
</div>

<script>

    function cadastrarAtendimento() {
        var nomeAtendimento = $(".nomeAtendimento").val();
        var quantidade = $(".quantidade").val();

        $.ajax({
            type: 'POST',
            url: page,
            data: {
                action: "toRegisterAttendance",
                nome: nomeAtendimento,
                qtd: quantidade,
            },
            success: function (data) {
                $("#tbody").html(data);
                showAttendance();
            }
        });
    }
</script>

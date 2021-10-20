<div class="ui form standard large modal scrolling transition hidden" id="modalCadastro">
    <div class="header"><i class="calendar check icon"></i>Cadastrar Evento</div>

    <div class="content">
        <form method="POST" enctype="multipart/form-data" id="formEvent">
            @csrf
            <div class="two fields">
                <div class="field" id="nameEvent">
                    <label>Nome</label>
                    <input type="text" name="nameEvent" placeholder="Nome do Evento" id="nome">
                    <div class="ui basic red pointing prompt label transition invisible hidden nameEvent"></div>
                </div>
                <div class="field" id="dateEvent">
                    <label>Data</label>
                    <div class="ui calendar" id="example2">
                        <div class="ui input left icon">
                            <i class="calendar alternate icon"></i>
                            <input type="text" name="dateEvent" placeholder="DD/MM/AAAA" onkeyup="mascaraData(this.value,'#alvo')" id="alvo" value="" maxlength="10"/>
                        </div>
                    </div>
                    <div class="ui basic red pointing prompt label transition invisible hidden dateEvent"></div>
                </div>
            </div>
    </div>

    <div class="actions" style="text-align: right">
    </div>
        </form>
    
</div>
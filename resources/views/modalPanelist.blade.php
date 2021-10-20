<div class="ui form standard large modal scrolling transition hidden" id="modalCadastro">
    <div class="header"><i class="users icon"></i> Adicionar Palestrante</div>
    <div class="content scrolling">
        <form method="POST" enctype="multipart/form-data" id="formPanelist">
            @csrf

            <div class="two fields">
                <div class="field">
                    <label>Nome</label>
                    <input type="text" name="nomePanelist" placeholder="Nome Completo" id="nomePanelist">
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

            <div class="novosEventos">
                <h4 class="ui horizontal divider header">
                    <i class="bar chart icon"></i>
                    Eventos
                </h4>
                <div id="eventosAll">
                    {{--Eventos--}}
                </div>
            </div>

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
    
    <div class="actions" style="text-align: right">
    </div>
    </form>
</div>

@section('name')
    
@endsection
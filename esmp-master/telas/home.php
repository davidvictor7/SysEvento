<div class="ui container containerPrincipal" id="containerToInformations" style="">
    <h1 class="textoTopoOuvidoria"><i class="home layout icon"></i>&nbsp;&nbsp;Página Inicial</h1>
    <div class="ui divider"></div>
    <div class="ui segment">
        <form class="ui form">
            <h4 class="ui header">Envie sua manifestação pelo formulário abaixo, os campos com asteriscos são obrigatórios</h4>
            <h2 class="ui dividing header">Sua identidade</h2>
            <div class="ui segment">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <div class="ui toggle checkbox">
                            <input type="checkbox" name="gift" tabindex="0" class="hidden">
                            <label>Desejo me identificar</label>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="ui dividing header">Tipo de Manifestação</h2>
            <div class="two fields">
                <div class="required field">
                    <label>Tipo</label>
                    <select class="ui fluid dropdown">
                        <option value="">Selecione uma opção</option>
                        <option value="1">Elogiar</option>
                        <option value="2">Sugerir</option>
                        <option value="3">Reclamar</option>
                    </select>
                </div>
                <div class="required field">
                    <label>Assunto</label>
                    <input type="text" name="assunto" placeholder="Assunto">
                </div>
            </div>
            <h2 class="ui dividing header">Dados Pessoais</h2>
            <div class="two fields">
                <div class="required field">
                    <label>Identificação</label>
                    <input type="text" name="identificacao" placeholder="Digite sua identificação">
                </div>
                <div class="field">
                    <label>Nome</label>
                    <input type="text" name="nome" readonly placeholder="Nome" tabindex="-1">
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Setor/Curso</label>
                    <input type="text" name="email" readonly placeholder="Setor/Curso" tabindex="-1">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="text" name="email" readonly placeholder="Email" tabindex="-1">
                </div>
            </div>
            <h2 class="ui dividing header">Mensagem</h2>
            <div class="field">
                <label>Descrição</label>
                <textarea></textarea>
            </div>
            <div class="field" id="botoes">
                <button class="positive ui button" id="btnEnviar">
                    Enviar
                </button>
                <button class="ui red button" id="btnLimparDescricao">
                    Limpar Descrição
                </button>
            </div>
        </form>
    </div>
</div>
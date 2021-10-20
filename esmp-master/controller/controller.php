<?php
//Importando a conexao:
include "../connection/connection.php";

//Recebendo o POST do action:
$action = $_POST['action'];

switch ($action) {

    //Mostra atuações dos palestrantes
    case "showActing":
        $sql = "select * from Atuacao order by nome";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = "<option class='changeColor' value='-1'>Selecione uma atuação</option>";

        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<option value=" . $rows['idAtuacao'] . ">" . $rows['nome'] . "</option>";
        }
        echo $dados;
        break;

    //Mostra os eventos cadastrados em palestrantes
    case "showEvents":
        $sql = "select * from Evento order by nome";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = "<option class='changeColor' name='MostrarEvento' value='-1'>Selecione um evento</option>";
        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<option value=" . $rows['idEvento'] . ">" . $rows['nome'] . " - " .implode('/', array_reverse(explode('-', $rows['dataEvento'])))."</option>";
        }
        echo $dados;
        break;

    //Adicionar novos eventos.#####################################################################################
    case "addTheme":
        $sql = "select * from Evento order by nome";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = "<div class=\"field\">
                <label>Evento</label>
                <select class=\"ui fluid dropdown\" id=\"events\">
                    <option class='changeColor' value='-1'>Selecione um evento</option>
                </select>
            </div>
            <div class=\"field tema2\">
                <label>Tema</label>
                <input type=\"text\" name=\"shipping[first-name]\" placeholder=\"Tema do Evento\" id=\"tema\">
            </div>
            <div style=\"text-align: center;\">";

        while ($rows = mysqli_fetch_array($query)) {
            $dados = "<div class=\"field\">
                    <label>Evento</label>
                    <select class=\"ui fluid dropdown\" id=\"events\">
                        <option value=" . $rows['idEvento'] . ">" . $rows['nome'] . " - " .implode('/', array_reverse(explode('-', $rows['dataEvento'])))."</option>
                    </select>
                </div>
                <div class=\"field tema2\">
                    <label>Tema</label>
                    <input type=\"text\" name=\"shipping[first-name]\" placeholder=\"Tema do Evento\" id=\"tema\">
                </div>
                <div style=\"text-align: center;\">";
            var_dump($rows['nome']);
        }
        echo $dados;
        break;

    //Mostrar Palestrantes
    case "mostrarPalestrante":
        $sql = "select * from Palestrante";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = null;

        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<tr id='tr'><td>" . $rows['nome'] . "</td>"."<td>".$rows['sexo']."</td>"."<td>" . $rows['cargo'] . "</td>"."<td>" . $rows['email'] . "</td>"."<td>" . $rows['telefone'] . "</td>". "<td><a class='ui tiny green icon button' onclick=\"openModal('viewEvent', " . $rows['idPalestrante'] . ");\"><i class=\"eye icon\"></i></a><a onclick=\"openModal('editTimeline', " . $rows['idPalestrante'] . ");\" class='ui tiny yellow icon button' id='" . $rows['idPalestrante'] . "'><i class='pencil icon'></i></a> <a class='ui tiny red icon button delPalestrante' id='" . $rows['idPalestrante'] . "'><i class='trash icon'></i></a><a class='ui tiny blue icon button disabled' id=\"\"><i class='download icon'></i></a></td>" . "</tr>";
        }
        echo $dados;
        break;

    //Cadastrar palestrante
    case "cadastrarPalestrante":
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $eventos = json_decode($_POST['EVENTOS']);

        $sqlPalestrante = "insert into Palestrante (nome, sexo, email, telefone, cargo) values ('$nome','$sexo', '$email', '$telefone', '$cargo')";
        $queryPalestrante = mysqli_query($conecta, $sqlPalestrante);

        $id = mysqli_insert_id($conecta);

        foreach($eventos as $evento){
            $sql = "INSERT INTO Palestrante_Atuacao_Evento (idPalestrante, idAtuacao, idEvento, temaEvento, cargaHoraria) VALUES ($id, $evento->ATUACAO, $evento->EVENTO, '$evento->TEMA', '$evento->HORARIO')";
            $queryPalestrante = mysqli_query($conecta, $sql);
        }

        break;


    //Deleta Palestrante
    case "deletePalestrante":
        $idPalestrante = $_POST['idPalestrante'];
        $sqlDelPalestrante = "delete from Palestrante where idPalestrante = '$idPalestrante'";
        $sqlDelRelacaoPalestrante = "delete from Palestrante_Atuacao_Evento where idPalestrante = '$idPalestrante'";

        $queryDelPalestrante = mysqli_query($conecta, $sqlDelPalestrante);
        $queryDelRelacaoPalestrante = mysqli_query($conecta, $sqlDelRelacaoPalestrante);
        return true;
        break;

    //Mostrar Eventos
    case "mostrarEvento":
        $sql = "select * from Evento";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = null;

        while ($rows = mysqli_fetch_array($query)) {
            $data = implode('/', array_reverse(explode('-', $rows['dataEvento'])));
            $dados .= "<tr id='tr'><td>" . $rows['nome'] . "</td>" . "<td>" . $data . "</td>" . "<td><a onclick=\"openModal('viewEvent', " . $rows['idEvento'] . ");\" class='ui tiny green icon button'><i class=\"eye icon\"></i></a><a onclick=\"openModal('editEvento', " . $rows['idEvento'] . ");\" class='ui tiny yellow icon button' id='" . $rows['id'] . "'><i class='pencil icon'></i></a> <a class='ui tiny red icon button delEvent' id='" . $rows['idEvento'] . "'><i class='trash icon'></i></a><a class='ui tiny blue icon button disabled' id=\"\"><i class='download icon'></i></a></td>" . "</tr>";
        }
        echo $dados;
        break;

    //Cadastro de Evento - Funcionando
    case "cadastrarEvento":
        $nome = $_POST['nome'];
        $dates = $_POST['dates'];
        $inverteData = implode('/', array_reverse(explode('/', $dates))); //Inverter data de (d/m/y) para (y/m/d) e cadastrar no banco
        $sql = "insert into Evento (nome, dataEvento) values ('$nome', '$inverteData')";
        $query = mysqli_query($conecta, $sql);
        break;

    case "deleteEvent":
        $id = $_POST['idEvento'];
        $sqlDelEvent = "delete from Evento where idEvento = '$id'";
        $sqlDelRelacaoEvent = "delete from Palestrante_Atuacao_Evento where idEvento = '$id'";

        $queryDelEvent = mysqli_query($conecta, $sqlDelEvent);
        $queryDelRelacaoEvent = mysqli_query($conecta, $sqlDelRelacaoEvent);
        $queryDelRelacaoEvent = mysqli_query($conecta, $sqlDelRelacaoEvent);
        return true;
        break;

    case "editEventos":
        $palavra = $_POST['id'];
        $sql = "select * from Evento where idEvento = '$palavra'";
        $query = mysqli_query($conecta, $sql);
        $row = mysqli_fetch_array($query);
        $array = [
            "nome" => $row['nome'],
            "tema" => $row['tema'],
            "datas" => implode('/', array_reverse(explode('-', $row['dataEvento']))),
        ];
        echo json_encode($array);
        break;

    case "viewEventos":
        $id = $_POST['id'];
        //$sql = "select * from Evento where idEvento = '$palavra'";
        $sqlP = "select * from Palestrante where idEvento = (select idPalestrante from Palestrante_Atuacao_Evento where idEvento='$id')";
        $queryP = mysqli_query($conecta, $sqlP);

        $dados = null;


        while ($rows = mysqli_fetch_array($queryP)) {
            $dados .= "<tr id='tr'><td>" . $rows['nome'] . "</td>"."<td>".$rows['sexo']."</td>"."<td>" . $rows['cargo'] . "</td>"."<td>" . $rows['email'] . "</td>"."<td>" . $rows['telefone'] . "</td>". "<td><a class='ui tiny green icon button' onclick=\"openModal('viewEvent', " . $rows['idPalestrante'] . ");\"><i class=\"eye icon\"></i></a><a onclick=\"openModal('editTimeline', " . $rows['idPalestrante'] . ");\" class='ui tiny yellow icon button' id='" . $rows['idPalestrante'] . "'><i class='pencil icon'></i></a> <a class='ui tiny red icon button delPalestrante' id='" . $rows['idPalestrante'] . "'><i class='trash icon'></i></a><a class='ui tiny blue icon button disabled' id=\"\"><i class='download icon'></i></a></td>" . "</tr>";
        }

        //$query = mysqli_query($conecta, $sql);
        //$row = mysqli_fetch_array($query);
        //$array = [
            //"nome" => $row['nome'],
            //"dataEvento" => $row['dataEvento'],
          //  "datas" => implode('/', array_reverse(explode('-', $row['dataEvento']))),
        //];
        echo json_encode($dados);
        break;

    case "alterEvent":
        $id = $_POST['id'];
        $nome = $_POST['nomeEvento'];
        $dataEvento = implode("-", array_reverse(explode("/", $_POST["dataEvento"])));
        $sql = 'update Evento set nome = "'.$nome.'", dataEvento = "'.$dataEvento.'" WHERE idEvento = '.$id;
        $query = mysqli_query($conecta, $sql);
        break;
//##########################################################################################################
    case "getDataSelectedAction":
        $palavra = $_POST['palavra'];
        $sql = "select * from timelines where id like '%$palavra%' or titulo like '%$palavra%'";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = null;

        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<tr><td>" . $rows['id'] . "</td>" . "<td>" . $rows['periodo'] . "</td>" . "<td>" . $rows['titulo'] . "</td>" . "<td>" . $rows['descricao'] . "</td>" . "<td><a class='ui tiny yellow icon button'><i class='pencil icon'></i></a> <a class='ui tiny red icon button'><i class='trash icon'></i></a></td>" . "</tr>";
        }
        echo $dados;
        break;

    case "showDataToSelect":
        $sql = "select * from timelines";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = "<option value=\"0\" >Todos</option>";

        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<option value = " . $rows['id'] . ">" . $rows['periodo'] . "</option>";
        }

        echo $dados;
        break;

    case "getDataDate":
        $palavra = $_POST['palavra'];
        $sql = "select * from timelines where id = '$palavra'";
        $query = mysqli_query($conecta, $sql);
        $qtd = mysqli_num_rows($query);
        $dados = null;

        while ($rows = mysqli_fetch_array($query)) {
            $dados .= "<tr><td>" . $rows['id'] . "</td>" . "<td>" . $rows['periodo'] . "</td>" . "<td>" . $rows['titulo'] . "</td>" . "<td>" . $rows['descricao'] . "</td>" . "<td><a class='ui tiny yellow icon button'><i class='pencil icon'></i></a> <a class='ui tiny red icon button'><i class='trash icon'></i></a></td>" . "</tr>";
        }
        echo $dados;
        break;

    case "eventoPalestrante":
        $id = $_POST['id'];
        $sqlP = "select * from Palestrante_Atuacao_Evento where id = '$id'";
        //$sqlA = "select * from Atuacao";
        //$sqlPAE = "select * from Palestrante_Atuacao_Evento";
        
        $queryP = mysqli_query($conecta, $sqlP);
        //$queryA = mysqli_query($conecta, $sqlA);
        //$queryPAE = mysqli_query($conecta, $sqlPAE);
        
        $qtd = mysqli_num_rows($query);
        $dados = null;
    
        while ($rows = mysqli_fetch_array($queryP)) {
            $dados .= "<tr id='tr'><td>" . $rows['idPalestrante'] . "</td>"."<td>".$rows['idAtuacao']."</td>"."<td>" . $rows['temaEvento'] . "</td>"."<td>" . $rows['cargaHoraria'] . "</td>"."<td>" . $rows['idPalestrante'] . "</td>"."</tr>";
        }
        echo $dados;
        break;

    default:
        break;
}
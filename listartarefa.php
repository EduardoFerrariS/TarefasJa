<?php
include_once "conexao.php";
session_start();
$usuario_id = $_SESSION['id'];

$conexao = new conexao();

// Verificar a ordem selecionada
$ordem = isset($_GET['ordem']) ? $_GET['ordem'] : "data_criacao";
$ordemDescricao = $ordem == "data_criacao" ? "Data de Criação" : "Data de Conclusão";

// Verificar o filtro selecionado
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "todas";
$filtroDescricao = $filtro == "pendentes" ? "Pendentes" : ($filtro == "concluidas" ? "Concluídas" : "Todas");

// Montar a consulta SQL com base na ordem e no filtro selecionados
$sql = "SELECT * FROM tarefas WHERE usuario_id = '$usuario_id'";

if ($filtro == "pendentes") {
    $sql .= " AND (data_conclusao IS NULL OR data_conclusao > CURDATE())";
} elseif ($filtro == "concluidas") {
    $sql .= " AND (data_conclusao IS NOT NULL AND data_conclusao <= CURDATE())";
}

$sql .= " ORDER BY $ordem DESC";

$arrtarefa = $conexao->executar($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Tarefas</title>
</head>

<body>
    <div class="containers">
        <style>
            body {
                background-image: none;
            }
        </style>
        <h2>Lista de Tarefas</h2>
        <br>
        <div class="tab">
            <a href="cadastro_tarefa.php">Criar tarefa</a>
            <br>
            <a href="trocasenha.php">Trocar senha de usuário</a>
            <br><br>
            <form method="GET">
                <label for="ordem">Ordenar por:</label>
                <select id="ordem" name="ordem" onchange="this.form.submit()">
                    <option value="data_criacao" <?php if ($ordem == "data_criacao") echo "selected"; ?>>Data de Criação</option>
                    <option value="data_conclusao" <?php if ($ordem == "data_conclusao") echo "selected"; ?>>Data de Conclusão</option>
                </select>
            </form>
            <br><br>
            <form method="GET">
                <label for="filtro">Filtrar por:</label>
                <select id="filtro" name="filtro" onchange="this.form.submit()">
                    <option value="todas" <?php if ($filtro == "todas") echo "selected"; ?>>Todas</option>
                    <option value="pendentes" <?php if ($filtro == "pendentes") echo "selected"; ?>>Pendentes</option>
                    <option value="concluidas" <?php if ($filtro == "concluidas") echo "selected"; ?>>Concluídas</option>
                </select>
            </form>
            <br><br>
            <table>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
                    <th>Data de Conclusão</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
                <?php
                foreach ($arrtarefa as $tarefa) {
                ?>
                    <tr>
                        <td><?= $tarefa['titulo'] ?></td>
                        <td><?= $tarefa['descricao'] ?></td>
                        <td><?= $tarefa['data_criacao'] ?></td>
                        <td><?= $tarefa['data_conclusao'] ?></td>
                        <td>
                            <a href="cadastro_tarefa.php?tarefa=<?= $tarefa['id'] ?>">Alterar</a>
                        </td>
                        <td>
                            <a href="acao.php?tarefa=<?= $tarefa['id'] ?>&acao=5">Excluir</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <?php
        if (isset($_GET['acao'])) {
        ?>
            <div class="alert alert-success">
                <?php
                if ($_GET['acao'] == 1 || $_GET['acao'] == 5) {
                    echo "Salvo com sucesso!";
                } else if ($_GET['acao'] == 3) {
                    echo "Alterado com sucesso!";
                } else if ($_GET['acao'] == 4) {
                    echo "Excluído com sucesso!";
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>

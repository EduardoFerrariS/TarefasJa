<?php

include_once "conexao.php";
session_start();
$usuario_id=$_SESSION['id'];

$conexao = new conexao();
?>
<div class="list">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<div class="containers">
    <style>
        body{
            background-image: none;
        }
    </style>
<body>
<h2>Lista de tarefa</h2>
</br>
<div class="tab">
<a href="cadastro_tarefa.php"> Criar tarefa </a>
<table>

    <tr>
        <th>titulo</th>
        <th>descrição</th>
        <th>Data criação</th>
        <th>data conclusão</th>
        <th>ALTERAR</th>
        <th>EXCLUIR</th>
    </tr>
</div>
  <?php
   $arrtarefa= $conexao->executar("select * from tarefas where usuario_id ='$usuario_id' ");
   
   foreach ($arrtarefa as $tarefa){
     ?>

     <tr>
        <td><?=$tarefa['titulo']?></td>
        <td><?php echo $tarefa['descricao']; ?></td>
        <td><?=$tarefa['data_criacao']?></td>
        <td><?=$tarefa['data_conclusao']?></td>
        <td>
            <a href="cadastro_tarefa.php?tarefa=<?=$tarefa['id']?>">Alterar</a>
        </td>
        <td>
        <a href="acao.php?tarefa=<?=$tarefa['id']?>&acao=5">Excluir</a>

        </td>
     </tr>
     <?php   
   }
  ?>
</table>
</div>
</body>
<?php
if(isset($_GET['acao']) ){
?>
<div class="alert alert-success">
<?php
if($_GET['acao']==1 || $_GET['acao']==5 )
{
    echo "Salvo com sucesso!";
}else if($_GET['acao']==3){
    echo "Alterado com sucesso!";
}else if($_GET['acao']==4){
    echo "Excluido com sucesso!";
}
?>

</div>

<?php
}
?>

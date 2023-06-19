<?php
include_once "seguranca.php";
include_once "conexao.php";
$acao = $_GET["acao"];
session_start();
$id_usuario=$_SESSION['id'];

if($acao==2){

    $nome=$_POST['nome'];
    $senha= $_POST['senha'];
    
    $sql="insert into usuarios (nome,senha) values ('$nome','$senha')";
    $conexao= new conexao();
    $conexao->executar($sql);
    header("location: login.php?acao=1");
    die();
}
    elseif ($acao == 3) {
        $nometarefa = $_POST['nometarefa'];
        $descricao = $_POST['descricao'];
        $data_criacao = $_POST['data_criacao'];
        $data_conclusao = $_POST['data_conclusao'];        

            $sql = "INSERT INTO tarefas(usuario_id,titulo,descricao,data_criacao,data_conclusao) 
                    VALUES ('$id_usuario', '$nometarefa', '$descricao', '$data_criacao', '$data_conclusao')";
            $conexao = new conexao();
            $conexao->executar($sql);
            header("location: listartarefa.php?acao=1");
        }
        
    elseif($acao==4){
        $idtarefa = $_POST['id'];
        $nometarefa = $_POST['nometarefa'];
        $descricao = $_POST['descricao'];
        $data_criacao = $_POST['data_criacao'];
        $data_conclusao = $_POST['data_conclusao'];
        
    
        $sql = "UPDATE tarefas SET titulo = '$nometarefa', descricao = '$descricao', data_criacao = '$data_criacao', data_conclusao = '$data_conclusao' WHERE id = '$idtarefa'";
        $conexao = new conexao();
        $conexao->executar($sql);
        header("location: listartarefa.php?acao=3");
        die();
    
    }elseif($acao==5){
        $id = $_GET['tarefa'];
    
        $sql = "DELETE FROM tarefas WHERE id = '$id'";
        $conexao = new conexao();
        $conexao->executar($sql);
        header("location: listartarefa.php?acao=4");
        die();
    
    }
    


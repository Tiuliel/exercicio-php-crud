<?php
require_once"src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<style>
        *{box-sizing: border-box;}

        .alunos {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    width: 80%;
    margin: auto;
}

.aluno {
    padding: 1rem;
    width: 49%;
    box-shadow: black 0 0 10px;
}

    </style>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>


 
    <div class="alunos">
        <?php foreach($listaDeAlunos AS $aluno){
           ?>
           <div class="aluno">
            <p><b>Nome: </b> <?=$aluno["nome"]?>
            </p>
            <p><b>Nota1: </b><?=$aluno["nota1"]?></p>
            <p><b>Nota2: </b><?=$aluno["nota2"]?></p>
            <hr>
            <p> <a href="atualizar.php?id=<?=$aluno["id"]?>">Atualizar</a> </p>
            <p> <a class="excluir" href="excluir.php?id=<?=$aluno["id"]?>">excluir</a> </p>
        </div>
        
           
        <?php }?>
    </div>
  

    



   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a href="index.php">Voltar ao início</a></p>

<script src="js/confirma-exclusao.js" ></script>
</body>
</html>
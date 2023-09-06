<?php
require_once"src/funcoes-alunos.php";
$idAluno = filter_input(INPUT_GET, 'id',
FILTER_SANITIZE_NUMBER_INT);
$nomeDoAluno = lerUmAluno($conexao, $idAluno);

$media = mediaAluno($nomeDoAluno["nota1"], $nomeDoAluno["nota2"]);
$mensagem = situacaoAluno($media);

if (isset($_POST['atualizar'])) {
    $nomeDoAluno = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $nota1 = filter_input(
        INPUT_POST,
        "nota1", FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
      );
      $nota2 = filter_input(
        INPUT_POST, "nota2",
        FILTER_SANITIZE_SPECIAL_CHARS,
        FILTER_FLAG_ALLOW_FRACTION
      );

    atualizarAluno($conexao, $nomeDoAluno, $idAluno, $nota1, $nota2);
    header("location:visualizar.php?status=sucesso");
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
	    <p><label for="nome">Nome:</label>
	    <input type="text" value="<?=$nomeDoAluno["nome"]?>" name="nome" id="nome" required></p>
        
        <p><label for="nota1">Primeira nota:</label>
	    <input name="nota1" value="<?=$nomeDoAluno["nota1"]?>" type="number" id="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="nota2">Segunda nota:</label>
	    <input name="nota2" value="<?=$nomeDoAluno["nota2"]?>" type="number" id="segunda" step="0.01" min="0.00" max="10.00" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
        
            <label for="media">Média:</label>
            <input name="media" value="<?=$media?>" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" value="<?=$mensagem?>" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button name="atualizar">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>

<script src="js/atualizar-campos.js"></script>

</body>
</html>
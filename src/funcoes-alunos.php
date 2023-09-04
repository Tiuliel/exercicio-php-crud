<?php

require_once"conecta.php";

function lerAlunos(PDO $conexao):array{
    $sql = "SELECT * FROM alunos ORDER BY  nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        
    } catch (Exception $erro) {
       die("Erro: ".$erro->getMessage());
    }

    return $resultado;
}

function inserirAlunos(PDO $conexao, string $nomeDoAluno, float $nota1, float $nota2):void{
    $sql = "INSERT INTO alunos(nome, nota1, nota2) VALUES (:nome,:nota1, :nota2)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nomeDoAluno, PDO::PARAM_STR);
        $consulta->bindValue(":nota1", $nota1, PDO::PARAM_STR);
        $consulta->bindValue(":nota2", $nota2, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function lerUmAluno(PDO $conexao, int $idAluno):array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;
}

function atualizarAluno(PDO $conexao, string $nomeDoAluno, int $idAluno, float $nota1, float $nota2):void{
    $sql = "UPDATE alunos SET nome = :nome, nota1 = :nota1, nota2 = :nota2 WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nomeDoAluno, PDO::PARAM_STR);
        $consulta->bindValue(":nota1", $nota1, PDO::PARAM_STR);
        $consulta->bindValue(":nota2", $nota2, PDO::PARAM_STR);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $idAluno):void{
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue("id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir: ".$erro->getMessage());
    }
}

function mediaAluno(float $nota1, float $nota2) : string
{
    $media = ($nota1 + $nota2) / 2;
    return number_format($media, 2);
}


function situacaoAluno(float $media) : string
{
    if($media < 5) {
        $mensagem = "Reprovado";
    } elseif ($media >= 7) {
        $mensagem = "Aprovado";
    } else {
        $mensagem = "Recuperação";
    }

    return $mensagem;
}

function formatacaoDeNotas(float $nota) : string
{
    return number_format($nota, 1);
}

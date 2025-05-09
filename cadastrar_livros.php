<?php
include_once 'conexao.php';
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_POST["titulo"])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'];
    try {
        $stmt = $conexao->prepare("INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (:titulo, :autor, :ano_publicacao)");
        $stmt->bindValue(':titulo', $titulo);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':ano_publicacao', $ano_publicacao);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "Dados cadastrados com sucesso!";
                $ID = $titulo = $autor = $ano_publicacao = "";
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
    }
}
?>
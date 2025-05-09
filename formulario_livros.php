<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de livros</h1>
    <form action="cadastrar_livros.php?act=save" method="post">
        <hr>
        <input type="hidden" name="act" value="save">
        <input type="hidden" name="ID" id="ID">
        <label for="titulo">Título do livro</label>
        <input type="text" name="titulo" id="titulo">
        <label for="autor">Autor do livro</label>
        <input type="text" name="autor" id="autor">
        <label for="ano_publicacao">Ano de publicação</label>
        <input type="number" name="ano_publicacao" id="ano_publicacao">
        <input type="submit" value="Cadastrar livro">
        <hr>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título do livro</th>
                    <th>Autor do livro</th>
                    <th>Ano de publicação</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include_once 'conexao.php';
                try {
                    $stmt = $conexao->prepare("SELECT * FROM livros");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>";
                            echo "<td>{$rs->ID}</td>";
                            echo "<td>{$rs->titulo}</td>";
                            echo "<td>{$rs->autor}</td>";
                            echo "<td>{$rs->ano_publicacao}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Erro ao recuperar os dados do banco.</td></tr>";
                    }
                } catch (PDOException $erro) {
                    echo "<tr><td colspan='5'>Erro: {$erro->getMessage()}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>
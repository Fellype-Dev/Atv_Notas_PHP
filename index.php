<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Notas</title>
</head>
<body>
    <h1>Gerenciamento de Notas</h1>

    <form method="post" action="">
        Nome: <input type="text" name="nome" required><br>
        Nota: <input type="number" name="nota" step="0.1" min="0" max="10" required><br>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <form method="post" action="">
        <input type="submit" name="excluir_todas" value="Excluir Todas as Notas">
    </form>

    <h2>Lista de Alunos e Notas</h2>
    <?php
    include 'functions.php';

    if (isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $nota = $_POST['nota'];
        cadastrarAluno($nome, $nota);
    }

    if (isset($_POST['excluir_todas'])) {
        excluirTodasNotas();
    }

    listarAlunos();
    ?>

    <h2>Média das Notas</h2>
    <?php
    $media = calcularMedia();
    echo "A média das notas é: " . number_format($media, 2);
    ?>
</body>
</html>
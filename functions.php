<?php
// Função para cadastrar um aluno
function cadastrarAluno($nome, $nota) {
    if ($nota < 0 || $nota > 10) {
        echo "<p style='color:red;'>Nota inválida! A nota deve estar entre 0 e 10.</p>";
        return;
    }

    $arquivo = fopen("notas.txt", "a");
    fwrite($arquivo, "$nome;$nota\n");
    fclose($arquivo);
}

// Função para listar todos os alunos e suas notas
function listarAlunos() {
    if (!file_exists("notas.txt")) {
        echo "<p>Nenhum aluno cadastrado.</p>";
        return;
    }

    $linhas = file("notas.txt");
    echo "<ul>";
    foreach ($linhas as $linha) {
        list($nome, $nota) = explode(";", $linha);
        echo "<li>$nome: $nota</li>";
    }
    echo "</ul>";
}

// Função para calcular a média das notas
function calcularMedia() {
    if (!file_exists("notas.txt")) {
        return 0;
    }

    $linhas = file("notas.txt");
    $total = 0;
    $quantidade = 0;

    foreach ($linhas as $linha) {
        list($nome, $nota) = explode(";", $linha);
        $total += $nota;
        $quantidade++;
    }

    return $quantidade > 0 ? $total / $quantidade : 0;
}

// Função para excluir todas as notas
function excluirTodasNotas() {
    if (file_exists("notas.txt")) {
        unlink("notas.txt");
        echo "<p style='color:green;'>Todas as notas foram excluídas com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Nenhum arquivo de notas encontrado.</p>";
    }
}

// Função para editar a nota de um aluno específico
function editarNota($nome, $novaNota) {
    if (!file_exists("notas.txt")) {
        echo "<p style='color:red;'>Nenhum aluno cadastrado.</p>";
        return;
    }

    $linhas = file("notas.txt");
    $arquivo = fopen("notas.txt", "w");

    foreach ($linhas as $linha) {
        list($nomeAtual, $notaAtual) = explode(";", $linha);
        if ($nomeAtual == $nome) {
            fwrite($arquivo, "$nomeAtual;$novaNota\n");
        } else {
            fwrite($arquivo, $linha);
        }
    }

    fclose($arquivo);
}
?>
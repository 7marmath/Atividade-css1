<?php
// Inclui o arquivo de conexão
include_once 'conexao.php';

function criarTabela() {
    $conn = conectarBanco();

    if ($conn) {
        $sql = "CREATE TABLE IF NOT EXISTS Inscrito (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome_completo TEXT NOT NULL,
            email_contato TEXT NOT NULL,
            telefone_contato TEXT NOT NULL,
            data_nasc TEXT NOT NULL,
            genero_contato TEXT NOT NULL,
            mensagem_contato TEXT NOT NULL
        )";

        try {
            $conn->exec($sql);
            echo "Tabela 'Inscrito' criada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela: " . $e->getMessage();
        }
    }
}

criarTabela();
?>

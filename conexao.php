<?php
// Função para criar a conexão com o banco de dados SQLite e garantir que a tabela exista
function conectarBanco() {
    try {
        $conn = new PDO("sqlite:" . __DIR__ . "/meu_banco.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Criação da tabela com nomes coerentes ao novo formulário
        $sql = "CREATE TABLE IF NOT EXISTS Inscrito (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome_completo TEXT NOT NULL,
            email_contato TEXT NOT NULL,
            telefone_contato TEXT NOT NULL,
            data_nasc TEXT NOT NULL,
            genero_contato TEXT NOT NULL,
            mensagem_contato TEXT NOT NULL
        )";

        $conn->exec($sql);

        return $conn;
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
        return null;
    }
}
?>

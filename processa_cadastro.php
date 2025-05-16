<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário com os novos nomes
    $nome_completo = $_POST['nome_completo'];
    $email_contato = $_POST['email_contato'];
    $telefone_contato = $_POST['telefone_contato'];
    $data_nasc = $_POST['data_nasc'];
    $genero_contato = $_POST['genero_contato'];
    $mensagem_contato = $_POST['mensagem_contato'];

    // Validação dos dados
    if (empty($nome_completo) || empty($email_contato) || empty($telefone_contato) || empty($data_nasc) || empty($genero_contato) || empty($mensagem_contato)) {
        echo "Todos os campos são obrigatórios.";
    } else {
        $conn = conectarBanco();

        if ($conn) {
            $sql = "INSERT INTO Inscrito (nome, email, telefone, data_nascimento, genero, mensagem)
                    VALUES (:nome, :email, :telefone, :data_nascimento, :genero, :mensagem)";

            $stmt = $conn->prepare($sql);

            // Faz o bind dos parâmetros usando os novos nomes
            $stmt->bindParam(':nome', $nome_completo);
            $stmt->bindParam(':email', $email_contato);
            $stmt->bindParam(':telefone', $telefone_contato);
            $stmt->bindParam(':data_nascimento', $data_nasc);
            $stmt->bindParam(':genero', $genero_contato);
            $stmt->bindParam(':mensagem', $mensagem_contato);

            // Executa o comando
            if ($stmt->execute()) {
                echo "Dados enviados com sucesso!";
            } else {
                echo "Erro ao salvar os dados.";
            }
        } else {
            echo "Erro na conexão com o banco de dados.";
        }
    }
}
?>

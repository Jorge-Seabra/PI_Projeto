<?php
// Inclui o arquivo de banco de dados
include 'db.php';

// Define uma função para obter usuários do banco de dados
function getUsers() {
    // Obtém a conexão com o banco de dados
    $conn = getConnection();
    // Define a query SQL para selecionar os usuários
    $sql = "SELECT id, nome, email FROM usuarios";
    // Prepara a query SQL
    $stmt = $conn->prepare($sql);
    // Executa a query
    $stmt->execute();
    // Retorna todos os resultados como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém a conexão com o banco de dados
    $conn = getConnection();
    // Obtém a ação do formulário
    $action = $_POST['action'];

    // Verifica se a ação é 'Adicionar'
    if ($action == 'Adicionar') {
        // Obtém os dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Define a query SQL para inserir um novo usuário
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:name, :email)";
        // Prepara a query SQL
        $stmt = $conn->prepare($sql);
        // Vincula os parâmetros da query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        // Executa a query e verifica o resultado
        if ($stmt->execute()) {
            echo "Novo registro criado com sucesso!";
        } else {
            echo "Erro ao adicionar registro.";
        }
    } 
    // Verifica se a ação é 'Atualizar'
    elseif ($action == 'Atualizar') {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Define a query SQL para atualizar um usuário existente
        $sql = "UPDATE usuarios SET nome=:name, email=:email WHERE id=:id";
        // Prepara a query SQL
        $stmt = $conn->prepare($sql);
        // Vincula os parâmetros da query
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        // Executa a query e verifica o resultado
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro.";
        }
    } 
    // Verifica se a ação é 'Deletar'
    elseif ($action == 'Deletar') {
        // Obtém o ID do formulário
        $id = $_POST['id'];
        // Define a query SQL para deletar um usuário
        $sql = "DELETE FROM usuarios WHERE id=:id";
        // Prepara a query SQL
        $stmt = $conn->prepare($sql);
        // Vincula o parâmetro da query
        $stmt->bindParam(':id', $id);
        // Executa a query e verifica o resultado
        if ($stmt->execute()) {
            echo "Registro deletado com sucesso!";
        } else {
            echo "Erro ao deletar registro.";
        }
    } 
    // Verifica se a ação é 'Editar'
    elseif ($action == 'Editar') {
        // Cria um array com os dados do usuário a ser editado
        $editUser = [
            'id' => $_POST['id'],
            'nome' => $_POST['name'],
            'email' => $_POST['email']
        ];
        // Redireciona para index.php com os dados do usuário a ser editado
        header("Location: index.php?edit=" . urlencode(json_encode($editUser)));
        // Encerra a execução do script
        exit();
    }

    // Fecha a conexão com o banco de dados
    $conn = null;
    // Redireciona para index.php
    header("Location: index.php");
    // Encerra a execução do script
    exit();
}

?>
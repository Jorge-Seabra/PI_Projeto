<?php
// Conexão com o banco de dados (ajuste conforme seu ambiente)
$host = 'localhost:3308';
$user = 'root';
$senha = '';
$banco = 'aulaphp';

$conexao = mysqli_connect($host, $user, $senha, $banco);

// Verifica se a conexão foi estabelecida
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Operações CRUD

// CREATE ou UPDATE
if (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Se tiver ID, atualiza; senão, insere novo registro
    if (!empty($id)) {
        $query = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    } else {
        $query = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    }

    if (mysqli_query($conexao, $query)) {
        echo "Registro salvo/atualizado com sucesso!";
    } else {
        echo "Erro ao salvar/atualizar registro: " . mysqli_error($conexao);
    }
}

// DELETE
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM usuarios WHERE id=$id";

    if (mysqli_query($conexao, $query)) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
header("Location: index.php");

?>
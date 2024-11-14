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

// SELECT
$query = "SELECT id, nome, email FROM usuarios";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$linha['id']}</td>
                <td>{$linha['nome']}</td>
                <td>{$linha['email']}</td>
                <td>
                    <button onclick='editarRegistro({$linha['id']}, \"{$linha['nome']}\", \"{$linha['email']}\")'>Editar</button> 
                    <a href='crud.php?acao=excluir&id={$linha['id']}'>Excluir</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
}

mysqli_close($conexao);
?>
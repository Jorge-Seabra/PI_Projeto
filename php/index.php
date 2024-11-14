<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP com Tabela</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Formulário de Usuários</h2>

    <!-- Formulário para inserção e atualização -->
    <form id="formCrud" action="crud.php" method="post">
        <input type="hidden" name="id" id="id">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" name="salvar">Salvar</button>
    </form>

    <hr>

    <!-- Tabela para exibir os registros -->
    <h3>Registros</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="registros">
            <!-- Aqui serão inseridos os registros via PHP -->
            <?php include 'listar.php'; ?>
        </tbody>
    </table>

    <!-- JavaScript para manipulação dos dados -->
    <script>
        // Função para preencher o formulário com os dados do registro selecionado
        function editarRegistro(id, nome, email) {
            document.getElementById("id").value = id;
            document.getElementById("nome").value = nome;
            document.getElementById("email").value = email;
            window.scrollTo(0, 0); // Rolando para o topo da página para exibir o formulário
        }
    </script>
</body>
</html>
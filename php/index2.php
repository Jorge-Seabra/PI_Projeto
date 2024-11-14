<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD 2</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Formulário de Usuários</h2>
    <form action="crud2.php" method="POST">
        <?php
        $editUser = isset($_GET['edit']) ? json_decode($_GET['edit'], true) : null;
        ?>
        <input type="hidden" name="id" id="id" value="<?php echo $editUser ? $editUser['id'] : ''; ?>">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required value="<?php echo $editUser ? $editUser['nome'] : ''; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="<?php echo $editUser ? $editUser['email'] : ''; ?>">
        <input type="submit" name="action" value="<?php echo $editUser ? 'Atualizar' : 'Adicionar'; ?>">
    </form>

    <hr>

    <h3>Registros</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'crud2.php';
        $users = getUsers();
        foreach ($users as $user) {
            $editUserJson = htmlspecialchars(json_encode($user));
            echo "<tr>
                <td>{$user['id']}</td>
                <td>{$user['nome']}</td>
                <td>{$user['email']}</td>
                <td>
                    <form style='display:inline-block;' action='crud2.php' method='POST'>
                        <input type='hidden' name='id' value='{$user['id']}'>
                        <input type='hidden' name='name' value='{$user['nome']}'>
                        <input type='hidden' name='email' value='{$user['email']}'>
                        <input type='submit' name='action' value='Editar'>
                    </form>
                    <form style='display:inline-block;' action='crud2.php' method='POST'>
                        <input type='hidden' name='id' value='{$user['id']}'>
                        <input type='submit' name='action' value='Deletar'>
                    </form>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>

</html>
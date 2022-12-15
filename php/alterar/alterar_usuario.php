<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Usuários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>
    <?php

    $id = $_POST["id"];

    // conexão com banco 
    include("../conexao.php");

    if (isset($_POST["alt"])) {
        $query = "SELECT * FROM usuarios WHERE id = $id;";
        $exec = mysqli_query($host, $query);

        while ($dados = mysqli_fetch_array($exec)) {
            echo "<form method='post' action='../atualizar/atualizar_usuario.php'>";

            echo "<table>";
            echo "<input type='hidden' name='id' value='$dados[id]'>";
            echo "<tr><td>Nome:</td>";
            echo "<td><input type='text' name='nome' value='$dados[nome]'></td></tr>";
            echo "<tr><td>E-mail:</td>";
            echo "<td><input type='text' name='email' value='$dados[email]'></td></tr>";
            echo "</table><br>";

            echo "<input type='submit' name='atu' value='Atualizar'>";
            echo "</form>";
        }
    } else {
        $query = "DELETE FROM usuarios WHERE id = $id;";
        $exec = mysqli_query($host, $query);
        if (mysqli_affected_rows($host) <> 0) {
            echo "<script> alert('Removido com sucesso');
        location.href='/fichas/index_menu.html'</script>";
        } else {
            echo "<script>alert('Erro na remoção');
        location.href='/fichas/index_menu.html'</script>";
        }
    }
    ?>
</body>

</html>
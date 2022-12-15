<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Categorias</title>
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

    //gatilho do botão Alterar em listar_produto.php
    if (isset($_POST["alt"])) {
        $query = "SELECT * FROM personagens WHERE id = $id;";
        $exec = mysqli_query($host, $query);

        // construção do formulário de personagem com os dados preenchidos
        while ($dados = mysqli_fetch_array($exec)) {
            echo "<form method='post' action='../atualizar/atualizar_ficha.php'>";

            echo "<table>";
            echo "<input type='hidden' name='id' value='$dados[id]'>";
            echo "<tr><td>Nome:</td>";
            echo "<td><input type='text' name='nome' value='$dados[nome]'></td></tr>";
            echo "<tr><td>Ascendência:</td>";
            echo "<td><input type='text' name='ascendencia' value='$dados[ascendencia]'></td></tr>";
            echo "<tr><td>Profissão:</td>";
            echo "<td><input type='text' name='profissao' value='$dados[profissao]'></td></tr>";
            echo "<tr><td>Força:</td>";
            echo "<td><input type='number' name='forca' value='$dados[forca]'></td></tr>";
            echo "<tr><td>Agilidade:</td>";
            echo "<td><input type='number' name='agilidade' value='$dados[agilidade]'></td></tr>";
            echo "<tr><td>Astúcia:</td>";
            echo "<td><input type='number' name='astucia' value='$dados[astucia]'></td></tr>";
            echo "<tr><td>Empatia:</td>";
            echo "<td><input type='number' name='empatia' value='$dados[empatia]'></td></tr>";


            /*echo "<option value=''>Selecione uma categoria:</option>";

            $query2 = "SELECT * FROM categorias";
            $exec2 = mysqli_query($host, $query2);

            while ($dados2 = mysqli_fetch_array($exec2)) {
                $id2 = $dados2["idcategorias"];
                $nome = $dados2["nome"];
                if ($id2 == $dados['categorias_idcategorias']) {
                    echo "<option selected value='$id2'>$nome</option>";
                } else {
                    echo "<option value='$id2'>$nome</option>";
                }
            }
            echo "</select></td></tr>";*/

            echo "</table><br>";
            echo "<input type='submit' name='atu' value='Atualizar'>";
            echo "</form>";
        }
    } else {
        $query = "DELETE FROM personagens WHERE id = $id;";
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
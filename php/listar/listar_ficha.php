<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Fichas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>

    <?php
    // conexão com banco 
    include("../conexao.php");

    // importa dados de personagens
    $query = "SELECT * FROM personagens";
    $exec = mysqli_query($host, $query);


    //cabeçalho da tabela
    echo "<div id='tabela'> 
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ascendência</th>
        <th>Profissão</th>
        <th>Força</th>
        <th>Agilidade</th>
        <th>Astúcia</th>
        <th>Empatia</th>
        <th>AÇÕES</th>
    </tr>";

    // construção da lista por fetch e repetição
    while ($dados = mysqli_fetch_array($exec)) {
        echo "<form method='post' action='../alterar/alterar_ficha.php'>";
        $id = $dados["id"];
        //    $idcat = $dados["categorias_idcategorias"];
        echo "<tr>";
        echo "<td>" . $dados['id'] . "</td>";
        echo "<td>" . $dados['nome'] . "</td>";
        echo "<td>" . $dados['ascendencia'] . "</td>";
        echo "<td>" . $dados['profissao'] . "</td>";
        echo "<td>" . $dados['forca'] . "</td>";
        echo "<td>" . $dados['agilidade'] . "</td>";
        echo "<td>" . $dados['astucia'] . "</td>";
        echo "<td>" . $dados['empatia'] . "</td>";

        //importa dados de categorias
        /*    $query2 = "SELECT * FROM categorias 
    WHERE idcategorias = '$idcat'";
        $exec2 = mysqli_query($host, $query2);
        $dados2 = mysqli_fetch_array($exec2);
        echo "<td>" . $dados2['nome'] . "</td>";*/
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<td><input type='submit' name='alt' value='Alterar'>
        <input type='submit' name='rem' value='Remover'></td>";
        echo "</tr>";
        echo "</form>";
    }

    echo "</table></div><br>";
    echo "<input type='button' value='Imprimir' 
onclick='window.print()'>          ";
    echo "<input type='button' value='Voltar' 
onclick=location.href='/fichas/index_menu.html'>";

    ?>

</body>

</html>
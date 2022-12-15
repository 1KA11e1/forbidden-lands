<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Tela de Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="https://i.imgur.com/7ZFSvUg.png" width="300" />
    </header>

    <div id="titulo">
        <h4>CADASTRO DE PERSONAGENS</h4>
    </div>
    <div id="form">
        <h5>Informe os dados para cadastro:</h5>
        <form action="../php/cadastrar/cadastrar_ficha.php" method="post">
            <p>Usuário:</p>
            <?php
            echo "<select name='usuario'>";
            echo "<option value=''>Selecione um usuário:</option>";
            //consulta dos usuários
            $query = "SELECT * FROM usuarios";
            $exec = mysqli_query($host, $query);
            //construção do select com os nomes de usuários
            while ($dados = mysqli_fetch_array($exec)) {
                $id = $dados["id"];
                $usuario = $dados["usuario"];
                if ($id == $dados['id']) {
                    echo "<option selected value='$id'>$usuario</option>";
                } else {
                    echo "<option value='$id'>$usuario</option>";
                }
            };
            echo "</select></td></tr>";
            ?>
            <p>Nome:</p>
            <input type="text" name="nome" placeholder="EX.: Milo, Fade, Barba... ">
            <p>Ascendencia:</p>
            <select name="ascendencia">
                <option value="" placeholder="Escolha sua ascendência"></option>
                <option value="Humano">Humano</option>
                <option value="Orc">Orc</option>
                <option value="Elfo">Elfo</option>
                <option value="Anão">Anão</option>
                <option value="Halfling">Halfling</option>
            </select>
            <p></p>
            <p>Profissão</p>
            <select name="profissao">
                <option value="" placeholder="Escolha sua profissão"></option>
                <option value="Guerreiro">Guerreiro</option>
                <option value="Feiticeiro">Feiticeiro</option>
                <option value="Caçador">Caçador</option>
                <option value="Druida">Druida</option>
                <option value="Ladino">Ladino</option>
            </select>
            <p></p>
            <p>Atributos</p>
            <p>Você tem 14 pontos para distribuir entre os atributos. Os valores devem estar entre 2 e 4.</p>
            Força <select name="forca">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <p></p>
            Agilidade <select name="agilidade">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <p></p>
            Astúcia <select name="astucia">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <p></p>
            Empatia <select name="empatia">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <p></p>

            <div id='botoes'>
                <input id="cont" type="submit" name="submit" value="Enviar"><br><br>
                <input type="reset" value="Limpar"><br><br>
                <input type="button" value="Voltar" onclick="location.href='../index_menu.html'">
            </div>
        </form>
    </div>
</body>

</html>
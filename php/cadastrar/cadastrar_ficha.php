<?php


// recupera os dados enviados pelo formulário (form_ficha)
$usuario = $POST["usuario"];
$nome = $_POST["nome"];
$ascendencia = $_POST["ascendencia"];
$profissao = $_POST["profissao"];
$forca = $_POST["forca"];
$agilidade = $_POST["agilidade"];
$astucia = $_POST["astucia"];
$empatia = $_POST["empatia"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])) {

    if ($forca + $agilidade + $astucia + $empatia == 14) {

        // conexão com banco 
        include("../conexao.php");

        $query = "INSERT INTO personagens 
        VALUES (default, '$usuario', '$nome', '$ascendencia', '$profissao', '$forca', '$agilidade', '$astucia', '$empatia');";

        // execução da query
        mysqli_query($host, $query);

        // verifica se houve inserção e direciona conforme o resultado
        if (mysqli_affected_rows($host)) {
            echo "<script> alert('Cadastro realizado com sucesso');
                location.href='/fichas/index_menu.html'</script>";
        } else {
            echo "<script>alert('Erro no cadastro');
                location.href='/fichas/index_menu.html'</script>";
        }
    } else {
        echo "<script> alert('Total de pontos de atributos incorreto');
        location.href='/fichas/html/form_ficha.php'</script>";
    }
}
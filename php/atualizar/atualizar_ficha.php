<?php

// recupera os dados enviados pelo formulário (alterar_ficha)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $ascendencia = $_POST["ascendencia"];
    $profissao = $_POST["profissao"];
    $forca = $_POST["forca"];
    $agilidade = $_POST["agilidade"];
    $astucia = $_POST["astucia"];
    $empatia = $_POST["empatia"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE personagens 
    SET nome='$nome', ascendencia='$ascendencia', profissao='$profissao', 
    forca='$forca', agilidade='$agilidade', astucia='$astucia', empatia='$empatia'
    WHERE id='$id';";

    // echo "<pre>";
    //     print_r($query);
    // echo "</pre>";
    //     die();

    // execução da query
    mysqli_query($host, $query);

    // verifica se houve inserção e direciona conforme o resultado
    if (mysqli_affected_rows($host) <> 0) {
        echo "<script> alert('Cadastro atualizado com sucesso');
            location.href='/fichas/index_menu.html'</script>";
    } else {
        echo "<script>alert('Nenhum registro foi atualizado');
            location.href='/fichas/index_menu.html'</script>";
    }
}
<?php

// recupera os dados enviados pelo formulário (alterar_usuario)
if (isset($_POST["atu"])) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // conexão com banco 
    include("../conexao.php");

    // query de atualização
    $query = "UPDATE usuarios 
    SET nome='$nome', email='$email'
    WHERE id=$id;";

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
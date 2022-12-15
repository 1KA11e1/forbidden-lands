<?php

// recupera os dados enviados pelo formulário (form_cliente)
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// gatilho para conexão com o banco 
if (isset($_POST["submit"])) {

    // conexão com banco 
    include("../conexao.php");
    // if($host){
    //     echo "Conexão OK";
    //     }

    // query de inserção
    $query = "INSERT INTO usuarios 
    VALUES (default, '$nome', '$email', '$senha');";

    // execução da query
    mysqli_query($host, $query);

    // verifica se houve inserção e direciona conforme o resultado
    if (mysqli_affected_rows($host)) {
        echo "<script> alert('Cadastro realizado com sucesso');
            location.href='/fichas/index.html'</script>";
    } else {
        echo "<script>alert('Erro no cadastro');
            location.href='/fichas/index.html'</script>";
    }
}
<?php
// Captura os dados enviados pelo JavaScript
$dados = $_POST['dados'];

// Aqui você pode fazer qualquer coisa com os dados, como salvá-los em um banco de dados
// Por exemplo:
// $conexao = mysqli_connect('host', 'usuario', 'senha', 'banco_de_dados');
// $query = "INSERT INTO tabela (coluna) VALUES ('$dados')";
// mysqli_query($conexao, $query);

// Retorna uma resposta para o JavaScript
echo "Dados recebidos com sucesso: " . $dados;
?>

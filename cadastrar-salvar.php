<?php
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$nota = $_POST['nota'];

$nomeArquivo = $_FILES['imagem']['name'];
$partes = explode("." , $nomeArquivo);
$nomeNovo = round(microtime(true)) . "." . end($partes);

move_uploaded_file($_FILES['imagem']['tmp_name'] , $pasta . $nomeNovo);

include "conexao.php";

$sql = "insert into tb_compras (nome, quantidade, nota) values('$nome', '$quantidade', '$nota')";

$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);
header("location:index.php");


?>
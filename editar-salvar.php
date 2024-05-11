<?php
$id = $_GET['id'];
$quantidade = $_POST['quantidade'];
$nome = $_POST['nome'];
$nota = $_POST['nota'];
$status = $_POST['status'];

$nomeArquivo = $_FILES['imagem']['name'];
$partes = explode("." , $nomeArquivo);
$nomeNovo = round(microtime(true)) . "." . end($partes);

move_uploaded_file($_FILES['imagem']['tmp_name'] , $pasta . $nomeNovo);

include "conexao.php";


$sql = "update tb_compras set quantidade = '$quantidade', nome = '$nome', nota = '$nota', status = '$status' where id= $id  ";



$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);
header("location:index.php");



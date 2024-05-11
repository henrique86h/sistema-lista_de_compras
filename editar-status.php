<?php
$id = $_GET["id"];
include "conexao.php";
$sql = "update tb_compras set status = 1 where id = $id ";
$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);

header("location: index.php");
?>